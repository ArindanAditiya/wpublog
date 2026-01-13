<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostDashboardController;
use PHPUnit\Framework\MockObject\ReturnValueNotConfiguredException;

// other route
Route::get('/', function () {
    return view('home', [
        "title" => "Home Page",
        "lastPosts"  => Post::latest()->paginate(2),
        "popularPosts"  => Post::whereMonth("created_at", now()->month)->orderBy("watch", "desc")->paginate(2)
    ]);
});
Route::get('/profil-turatstebuireng', function () {
    return view('posts', ["title" => "Profil "]);
});
Route::get('/catalog', function () {
    return view('catalog', ["title" => "Catalog"]);
}); 
Route::get('/contact', function () {
    return view('contact', ["title" => "Kontak Kami"]);
    
});

//BLOG POSTS
Route::get("/posts", [PostController::class, "index"]);
Route::get("/post/{post:slug}", [PostController::class, "show"]);
Route::get("/post/{post:slug}/related", [PostController::class, "relatedPosts"]);

// ________________________________________________________

// BACKEND DASHBOARD

// TEMPORARY ROUTE
Route::get("/dashboard/create-account", function () {
    return view("dashboard.create-account", ["title" => "Create Account"]);
});
Route::get("/dashboard/approve-account", function () {
    return view("dashboard.approve-account", ["title" => "Approve Account"]);
});
Route::get("/dashboard/menejmen-kitab", function () {
    return view("dashboard.kitab-management", ["title" => "Upload Kitab"]);
});

// __________________________________________________________

// DASHBOARD POSTS
Route::middleware(["auth","verified"])->group(function () {
    // READ show all posts
    Route::get('/dashboard', [PostDashboardController::class, 'index'])->name('dashboard');

    // CREATE
    Route::get("/dashboard/menejemen-artikel", [PostDashboardController::class, "create"]);
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

// PROFILE
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post("/upload", [ProfileController::class, "upload"]);
});

require __DIR__.'/auth.php';

