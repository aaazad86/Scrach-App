<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Postcontroller;
use App\Models\Post;

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

Route::get('/', function () {
    return view('FrontEnd/index');
});

Route::get('/about', function () {
    return view('FrontEnd/about');
});


// DashBoard backend paneel 

Route::get('/dashboard', function () {
    $posts = Post::all();
    return view('dashboard', [
        'posts' => $posts,
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Add New post 
    Route::post('/newpost', [PostController::class, 'new_post'])->name('new-post');
    
    Route::get('/newpost', function () {
    return view('/Backend/newpost');
});
      // Edit post 
    Route::get('/editpost/{id}', [PostController::class, 'edit_post'])->name('edit-post');

      // Update post 
    Route::post('/updatepost/{id}', [PostController::class, 'update_post'])->name('update-post');

    // Delete post 
    Route::post('/deletepost/{id}', [PostController::class, 'delete_post'])->name('delete-post');


    // All post show
    Route::get('/allpost', [PostController::class, 'all_post'])->name('all-post');

    // Single post show
    Route::get('/singlepost/{id}', [PostController::class, 'single_post'])->name('single-post');


});

require __DIR__.'/auth.php';
