<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Routing\Controllers\Middleware;
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

Route::get('/', function () {
    return view('welcome');
})->middleware(['toHomeIfAuth'])->name('welcome');

Route::get('/home', function(){
    return view('homePage', ['title' => 'Home']);
}
)->middleware(['auth', 'verified'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard', ['title' => 'My posts']);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/new-post', function(){
    return view('new-post', ['title' => 'New post']);
})->middleware(['auth', 'verified'])->name('new-post');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
