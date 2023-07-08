<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ManagerController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ChartJsController;
use App\Http\Controllers\LoanController;

Route::get('/', [BookController::class, 'listguest'])->name('home');

Route::get('/contact', [DashboardController::class, 'contact'])->name('contact');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/user/{id}', [ManagerController::class, 'profil'])->name('user.update');
Route::post('/user/{id}', [ManagerController::class, 'update']);

Route::get('cat/{label}', [BookController::class, 'listbyCat'])->name('bycats');

Route::get('book/{id}', [BookController::class, 'singlebook'])->name('book');

Route::get('client/{id}', [ClientController::class, 'singleclient'])->name('client');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::get('/forgotpassword', [LoginController::class, 'forgotpassword'])->name('password.request');
Route::post('/forgotpassword', [LoginController::class, 'sendemail']);
Route::get('/reset/{token}', [LoginController::class, 'resetpasswordview'])->name('password.reset');
Route::post('/reset/{token}', [LoginController::class, 'resetpassword'])->name('password.update');



Route::get('/managers', [ManagerController::class, 'list'])->name('managers');
Route::delete('/managers/{id}', [ManagerController::class, 'destroy'])->name('managers.destroy');
Route::get('/managers/edit/{id}', [ManagerController::class, 'editview'])->name('managers.edit');
Route::post('/managers/edit/{id}', [ManagerController::class, 'edit']);
Route::get('/managers/register', [ManagerController::class, 'index'])->name('register');
Route::post('/managers/register', [ManagerController::class, 'store']);

Route::get('/books', [BookController::class, 'list'])->name('books');
Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy');
Route::get('/books/add', [BookController::class, 'index'])->name('addbook');
Route::post('/books/add', [BookController::class, 'store']);
Route::get('/books/edit/{id}', [BookController::class, 'editview'])->name('books.edit');
Route::post('/books/edit/{id}', [BookController::class, 'edit']);
Route::get('/books/search', [BookController::class, 'booksearch'])->name('booksearch');
Route::get('/books/search/trash', [BookController::class, 'booksearchtrash'])->name('booksearchtrash');
Route::get('/search', [BookController::class, 'search'])->name('homesearch');
Route::get('/books/restore', [BookController::class, 'restoreview'])->name('books.restore');
Route::post('/books/restore/{id}', [BookController::class, 'restore'])->name('book.restore');
Route::delete('/books/restore/{id}', [BookController::class, 'delete'])->name('book.delete');

Route::get('/categories', [CategoryController::class, 'list'])->name('cats');
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('cats.destroy');
Route::get('/categories/add', [CategoryController::class, 'index'])->name('addcat');
Route::post('/categories/add', [CategoryController::class, 'store']);
Route::get('/categories/edit/{id}', [CategoryController::class, 'editview'])->name('cats.edit');
Route::post('/categories/edit/{id}', [CategoryController::class, 'edit']);

Route::get('/clients', [ClientController::class, 'list'])->name('clients');
Route::delete('/clients/{id}', [ClientController::class, 'destroy'])->name('clients.destroy');
Route::get('/clients/add', [ClientController::class, 'index'])->name('addclient');
Route::post('/clients/add', [ClientController::class, 'store']);
Route::get('/clients/edit/{id}', [ClientController::class, 'editview'])->name('clients.edit');
Route::post('/clients/edit/{id}', [ClientController::class, 'edit']);
Route::get('clients/search', [ClientController::class, 'clientsearch'])->name('clientsearch');
Route::get('clients/search/trash', [ClientController::class, 'clientsearchtrash'])->name('clientsearchtrash');
Route::get('/clients/restore', [ClientController::class, 'restoreview'])->name('clients.restore');
Route::post('/clients/restore/{id}', [ClientController::class, 'restore'])->name('client.restore');
Route::delete('/clients/restore/{id}', [ClientController::class, 'delete'])->name('client.delete');


Route::get('/tags', [TagController::class, 'list'])->name('tags');
Route::delete('/tags/{id}', [TagController::class, 'destroy'])->name('tags.destroy');
Route::get('/tags/add', [TagController::class, 'index'])->name('addtag');
Route::post('/tags/add', [TagController::class, 'store']);
Route::get('/tags/edit/{id}', [TagController::class, 'editview'])->name('tags.edit');
Route::post('/tags/edit/{id}', [TagController::class, 'edit']);

Route::get('/loans', [LoanController::class, 'list'])->name('loans');

Route::get('/loans/add', [LoanController::class, 'index'])->name('addloan');
Route::post('/loans/add', [LoanController::class, 'store']);
Route::get('/loan/{id}', [LoanController::class, 'return'])->name('returnloan');


