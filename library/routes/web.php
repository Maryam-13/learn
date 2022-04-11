<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ImageController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('books', BookController::class);

Route::get('/books/show', [BookController::class, 'show'])
    ->middleware(['auth', 'verified'])->name('books.show');

//Route::get('image', [BookController::class, 'index'])->name('book.index');
//Route::post('image', [BookController::class, 'store'])->name('book.store');
//Route::post('image', [BookController::class, 'edit'])->name('books.edit');
Route::post('books/{book}', [BookController::class, 'update'])->name('books.update');

Route::post("books/{book}/give", [BookController::class, 'chek'])->name('books.chek');


require __DIR__ . '/auth.php';
