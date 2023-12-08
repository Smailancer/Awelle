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



Route::middleware('can:admin')->group(function () {
    Route::resource('admin/words', AdminWordController::class)->except('show')->parameters(['words' => 'word:id'])->names('admin.words');
});


Route::middleware('auth')->group(function () {
    Route::resource('words', WordController::class)->parameters(['words' => 'word:id'])->except(['show']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('words/{word:term}', [WordController::class, 'show'])->name('words.show');


Route::get('/Contact', [ContactController::class, 'show'])->name('contact');
Route::get('/Tamlab', [WordController::class, 'lab'])->name('TamLab');
Route::get('/Procourt', [WordController::class, 'court'])->name('Procourt');
Route::get('/Academy', [WordController::class, 'academy'])->name('Academy');
Route::get('/About', [WordController::class, 'about'])->name('About');




Route::post('words/{word:term}/comments', [CommentController::class, 'store']);

// Admin Section


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__.'/auth.php';
