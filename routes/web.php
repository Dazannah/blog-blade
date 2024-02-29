<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Routing\Controllers\Middleware;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PostController::class, 'show10'])->name('welcome')->middleware(['toHomeIfAuth']);

Route::get('/all-posts', [PostController::class, 'index'])->name('allpost');

Route::get('/home', function(){
    return view('homePage', ['pageTitle' => 'Home']);
}
)->middleware(['auth', 'verified'])->name('home');

Route::get('/dashboard', [PostController::class, 'ownPosts'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/post/{id}', [PostController::class, 'show'])->name('singlePost');

Route::get('/post/{id}/edit', [PostController::class, 'edit'])->middleware(['auth', 'verified'])->name('getEdit');
Route::post('/post/{id}/edit', [PostController::class, 'update'])->middleware(['auth', 'verified'])->name('saveEdit');

Route::get('/post/{id}/delete', [PostController::class, 'destroy'])->middleware(['auth', 'verified'])->name('saveEdit');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/new-post', [PostController::class, 'create'])->name('new-post');
    Route::post('/new-post', [PostController::class, 'store'])->name('new-post');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
