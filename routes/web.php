<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Symfony\Component\VarDumper\Caster\RedisCaster;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    // Route kembali ke home

Route::get('/', function () {
    $entertainments = Post::where('kategori', 'Entertainment')->latest()->paginate(3);
    $sports = Post::where('kategori', 'Sport')->latest()->paginate(3);
    $politics = Post::where('kategori', 'Politic')->latest()->paginate(3);
    $travels = Post::where('kategori', 'Travel')->latest()->paginate(3);
    $styles = Post::where('kategori', 'Style')->latest()->paginate(3);

  
    return view('welcome', compact('entertainments', 'sports', 'politics', 'travels', 'styles',));
})->name('/');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//////////////////////////////////////////////////////////////////////////////////////////////////


    //Route untuk melihat kategori berita

Route::resource('/posts', PostController::class);

Route::get('/posts/{kategori}/all', [PostController::class, 'all'])->name('posts.all');

Route::get('/posts/{kategori}/politic', [PostController::class, 'politic'])->name('posts.politic');

Route::get('/posts/{kategori}/sport', [PostController::class, 'sport'])->name('posts.sport');

Route::get('/posts/{kategori}/travel', [PostController::class, 'travel'])->name('posts.travel');

Route::get('/posts/{kategori}/style', [PostController::class, 'style'])->name('posts.style');

Route::get('/posts/{kategori}/hotnews', [PostController::class, 'hotnews'])->name('posts.hotnews');


// Route untuk search
Route::get('/search',[PostController::class,'search']);

// Route untuk berita full

Route::get('berita/{id}',[PostController::class,'berita'])->name('berita_full');




///////////////////////////////////////////////////////////////////////////////////////////////////

require __DIR__.'/auth.php';
