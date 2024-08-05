<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Book;
use App\Models\User;
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
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/admin/books',[BookController::class,'index'])->name('admin.books.book');
Route::get('/admin/books/create',[BookController::class,'create'])->name('admin.books.create');
Route::post('/admin/books/store',[BookController::class,'store'])->name('admin.books.store');
Route::get('/admin/books/edit/{id}',[BookController::class,'edit'])->name('admin.books.edit');
Route::put('/admin/books/update/{id}',[BookController::class,'update'])->name('admin.books.update');

Route::get('/admin/users',[UserController::class,'index'])->name('admin.users.user');


/* con subcarpeta
Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard');
*/
require __DIR__.'/auth.php';
