<?php

use App\Http\Controllers\PostDashboardController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use PHPUnit\Framework\MockObject\ReturnValueNotConfiguredException;

// other route
Route::get('/', function () {
    return view('home', ["title" => "Home Page"]);
});
Route::get('/about', function () {
    return view('about', ["title" => "About Page"]);
});
Route::get('/contact', function () {
    return view('contact', ["title" => "Contact Page"]);
});
// __________________________________________________________

//BLOG
Route::get('/posts', function () {
    $posts = Post::latest()->filter(request(["search",  "author", "category"]))->paginate(10)->withQueryString();
    return view('posts', ["title" => "All Blog Posts", "posts" => $posts]);
});
Route::get("/post/{post:slug}", function(Post $post){
    return view("post", ["title" => "Single Post", "post" => $post]);
});



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/dashboard', [PostDashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
// Route::post('/dashboard', [PostDashboardController::class, 'store'])->middleware(['auth', 'verified'])->name('dashboard');
// Route::get("/dashboard/create", [PostDashboardController::class, "create"])->middleware(['auth', 'verified']);
// Route::delete("/dashboard/{post:slug}", [PostDashboardController::class, "destroy"])->middleware(['auth', 'verified']);
// Route::get("/dashboard/{post:slug}", [PostDashboardController::class, "show"])->middleware(['auth', 'verified']) ;

Route::middleware(["auth","verified"])->group(function () {
    // READ show all posts
    Route::get('/dashboard', [PostDashboardController::class, 'index'])->name('dashboard');

    // CREATE
    Route::get("/dashboard/create", [PostDashboardController::class, "create"]);
    Route::post('/dashboard', [PostDashboardController::class, 'store']);
    Route::post("/uploadthumbnail", [PostDashboardController::class, "uploadThumbnail"]);

    // DELETE
    Route::delete("/dashboard/{post:slug}", [PostDashboardController::class, "destroy"]);

    // UPDATE
    Route::get("/dashboard/{post:slug}/edit", [PostDashboardController::class, "edit"]);
    Route::patch("/dashboard/{post:slug}/edit", [PostDashboardController::class, "update"]);

    // READ : show single post
    Route::get("/dashboard/{post:slug}", [PostDashboardController::class, "show"]);
});

// mideddlewere
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post("/upload", [ProfileController::class, "upload"]);
});

require __DIR__.'/auth.php';

