<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filters = request(['search', 'author', 'category']);
        $category = request('category');

        if (request('category')) {
            return view('posts', [
                'title' => 'Artikel '.Str::title(Str::replace('-', ' ', $category)),
                'posts' => Post::latest()->where("status", "published")->filter($filters)->paginate(10)->withQueryString(),
                'lastPosts' => Post::latest()->where("status", "published")->paginate(4)->withQueryString(),
                'popularPosts' => Post::whereMonth('created_at', now()->month)->where("status", "published")->orderBy('watch', 'desc')->paginate(4)->withQueryString(),
                'categoryName' => Str::title(Str::replace('-', ' ', $category)),
            ]);
        } else {
            return view('posts', [
                'title' => 'Artikel Turats Tebuireng',
                'posts' => Post::latest()->where("status", "published")->paginate(16)->withQueryString(),
                'lastPosts' => Post::latest()->where("status", "published")->paginate(4)->withQueryString(),
                'popularPosts' => Post::whereMonth('created_at', now()->month)->where("status", "published")->orderBy('watch', 'desc')->paginate(4)->withQueryString(),
            ]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('post', [
            'title' => $post->title,
            'post' => $post,
            'relatedPosts' => Post::where('category_id', $post->category_id)->where('id', '!=', $post->id)->inRandomOrder()->take(5)->get(),
            'lastPosts' => Post::latest()->paginate(4)->withQueryString(),
            'popularPosts' => Post::whereMonth('created_at', now()->month)->orderBy('watch', 'desc')->paginate(4)->withQueryString(),
        ]);
    }

    public function about()
    {
        return view('about', [
            'title' => 'About Us',
            'name' => 'Turat S Tebu Ireng',
            'email' => 'turatstebruireng@gmail.com',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
