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
Route::get('/test-normalization', [WordController::class, 'testNormalization']);

Route::get('/', [WordController::class, 'index'])->name('home');

Route::middleware('can:admin')->group(function () {
    Route::resource('admin/words', AdminWordController::class)->except('show')->parameters(['words' => 'word:id'])->names('admin.words');


    Route::get('admin/correction-suggestions', [AdminWordController::class, 'indexCorrectionSuggestions'])->name('admin.words.correctionSuggestions');
    Route::post('admin/correction-suggestions/{suggestion}', [AdminWordController::class, 'processCorrection'])->name('admin.words.processCorrection');

    Route::get('admin/correction-suggestions/{suggestion}', [AdminWordController::class, 'showCorrectionSuggestion'])
        ->name('admin.words.showCorrectionSuggestion');

});

Route::middleware('auth')->group(function () {

    Route::delete('words/{word:term}/comments/{comment}', [CommentController::class, 'destroy'])->name('words.comments.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/Contact', [ContactController::class, 'show'])->name('contact');
Route::get('/Tamlab', [WordController::class, 'lab'])->name('TamLab');
Route::get('/Procourt', [WordController::class, 'court'])->name('Procourt');
Route::get('/Academy', [WordController::class, 'academy'])->name('Academy');
Route::get('/About', [WordController::class, 'about'])->name('About');

Route::resource('words', WordController::class)->parameters(['words' => 'word:id'])->except(['show']);

Route::get('words/{word}/suggest-correction', [WordController::class, 'suggestCorrection'])->name('words.suggestCorrection');
Route::post('words/{word}/storeCorrectionSuggestion', [WordController::class, 'storeCorrectionSuggestion'])->name('words.suggest-correction');

Route::get('words/{word:term}', [WordController::class, 'show'])->name('words.show');


Route::resource('words/{word:term}/comments', CommentController::class)->only(['store', 'update']);

// Admin Section

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';


