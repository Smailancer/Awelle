<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WordController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminWordController;
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

Route::get('/', [WordController::class, 'index'])->name('home');

Route::get('/contact', [ContactController::class, 'show'])->name('contact');


Route::resource('words', WordController::class)->parameters(['words' => 'word:slug']);


// Route::word('words/{word:slug}/comments', [CommentController::class, 'store']);

// Admin Section
Route::middleware('can:admin')->group(function () {
    Route::resource('admin/words', AdminWordController::class)->except('show')->parameters(['words' => 'word:slug']);
});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
