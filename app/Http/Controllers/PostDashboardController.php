<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use League\CommonMark\Extension\CommonMark\Node\Inline\Strong;
use PHPUnit\Event\TestRunner\StaticAnalysisForCodeCoverageFinished;
use Psy\CodeCleaner\EmptyArrayDimFetchPass;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class PostDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view("dashboard.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $query = Post::where('author_id', Auth::id());

        if (request('keyword')) {
            $query->where('title', 'like', '%' . request('keyword') . '%');
        }
        
        if (request('sort_by')) {
            match (request('sort_by')) {
                'oldest'     => $query->oldest(),
                'latest'     => $query->latest(),
                'title_asc'  => $query->orderBy('title', 'asc'),
                'title_desc' => $query->orderBy('title', 'desc'),
                default      => $query->latest(),
            };
        } else {
            $query->latest(); // default sorting
        }
        
        return view('dashboard.article-management', [
            'posts'       => $query->paginate(10)->withQueryString(),
            'countPosts'  => $query->count(),
            'categories'  => Category::all(),
        ]);

    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        // dd($request->thumbnail);
        // $request->validate([
        //     "title"=>"required|unique:posts|min:4|max:255",
        //     "category_id" => "required",
        //     "body" => "required"
        // ]);

        
        Validator::make($request->all(),[ 
            //valiidation rules
            "title"=>"required|unique:posts|min:4|max:255",
            "category_id" => "required",
            "body" => "required|min:100",
            "thumbnail" => "max:1000"
        ],[ 
            // costume message
            "title.required" => "field :attribute harus diisi",
            "category_id.required" => "Pilih salah satu :attribute",
            "body.required" => ":attribute tidak boleh kosong",
            "body.min" => "miminal masukkan :min karakter atau",
            "thumbnail.image" => "yang anda upload harus berupa gambar(png,jpg,jpeg)",
            "thumbnail.max:1000" => "maksimal file yang dimasukkan adalah 1mb"
        ],[
            // costume field name
            "title" => "judul",
            "category_id" => "kategory",
            "body" => "tulisan",
            "thumbnail" =>  "gambar"
        ])->validate();
        
        // dd($request->thumbnail);

        // upload thumbnail kalau nggk pake filepond
        // if($request->hasFile("thumbnail")){
        //     if(!empty($request->user()->avatar)){
        //         Storage::disk("public")->delete($request->user()->avatar);
        //     }

        //     $thumbnailPath = $request->file("thumbnail")->store("img","public");
        // }

        if($request->thumbnail){
            if(!empty($request->user()->avatar)){
                Storage::disk("public")->delete($request->user()->avatar);
            }

            // buat nama baru / buang temp
            $newThumbnailName = Str::after($request->thumbnail, "tmp/");

            // mindahin dari temp ke public
            Storage::disk("public")->move($request->thumbnail, "img/$newThumbnailName");

            // ambil path baru
            $thumbnailPath = "img/$newThumbnailName";
        }

        Post::create([
            "title" => $request->title,
            "author_id" => Auth::user()->id,
            "category_id" => $request->category_id,
            "slug" => Str::slug($request->title),
            "body" => $request->body,
            "thumbnail" => $thumbnailPath ?? null
        ]);

        return redirect("/dashboard")->with(["success"=>"Artikel Berhasil ditambahkan"]);
    }

    public function uploadThumbnail(Request $request){
        if($request->hasFile("thumbnail")){
            $path = $request->file("thumbnail")->store("tmp", "public");
        }

        return $path;
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view("dashboard.show", ["post" => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        // return "ambatukam";
        return view("dashboard.edit", [
            "post" => $post,
            "categories" => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // cek dlu masuk apa nggk datanya yang dari form 
        // dd($post->thumbnail);

        //validation
        $request->validate([
            "title" => "required|min:4|max:255|unique:posts,title" . $post->title,
            "category_id" => "required",
            "body" => "required",
            "thumbnail" => "max:1000"
        ]);

        if($request->thumbnail){
            if(!empty($post->thumbnail)){
                Storage::disk("public")->delete($post->thumbnail);
            }

            // buat nama baru
            $newThumbnailName = Str::after($request->thumbnail, "tmp/");

            // pindahkan lokasinya
            Storage::disk("public")->move($request->thumbnail, "img/$newThumbnailName");
            
            // ambil path barunya
            $newPathName = "img/$newThumbnailName";
            // dd($newPathName);

        }

        // upload thumbnail
        // if($request->hasFile("thumbnail")){
        //     if(!empty($request->user()->avatar)){
        //         Storage::disk("public")->delete($request->user()->avatar);
        //     }
        //     $thumbnailPath = $request->file("thumbnail")->store("img","public");
        // }

        // Update
        $post->update([
            "title" => $request->title,
            "author_id" => Auth::user()->id,
            "category_id" => $request->category_id,
            "slug" => Str::slug($request->title),
            "body" => $request->body,
            "thumbnail" => $newPathName ?? $post->thumbnail
        ]);


        // Redirect
        return redirect("/dashboard")->with(["success"=>"Post berhasil diupdate"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $postTitle = $post->title;
        if(!empty($post->thumbnail)){
            Storage::disk("public")->delete($post->thumbnail);
        }
        Storage::disk("public")->delete("tmp/jxDT4HkW8aiQYwEPKg6I0sz8KxzOeWBrBnHPPDiE.jpg");
        $post->delete();
        return redirect("/dashboard")->with(["success"=>"Artikel <b>$postTitle</b> berhasil dihapus!"]);
    }
}
