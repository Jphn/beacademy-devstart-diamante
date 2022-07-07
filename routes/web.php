<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/* |-------------------------------------------------------------------------- | Web Routes |-------------------------------------------------------------------------- | | Here is where you can register web routes for your application. These | routes are loaded by the RouteServiceProvider within a group which | contains the "web" middleware group. Now create something great! | */

/** Login Page Route */
Route::get('/login', [UserController::class, 'getLoginPage'])->name('login.page');
Route::get('/register', [UserController::class, 'getRegisterPage'])->name('register.page');
Route::get('/checkout', [UserController::class, 'checkout'])->name('checkout.page');
Route::post('/auth', [UserController::class, 'postLoginAuth'])->name('auth.login');

Route::post('/user/create', [UserController::class, 'postNewUser'])->name('user.create');


/** Middleware for redirect admin/users */
Route::middleware(['admin'])->group(function () {

	Route::get('admin', function () { // all routes for the admin is put here

		dd("Voce é um administrador");
	}
	);
});

Route::middleware(['user'])->group(function () {

	Route::get('user', function () { // all routes for the user is put here

		dd("Voce é um Usuário padrão");
	}
	);
});

Route::get('/produto/cadastro', [ProductController::class, 'getNewProductPage'])->name('product.new');
Route::post('/produtos/cadastro', [ProductController::class, 'postCreateNewProduct'])->name('products.create');

// Route store
Route::get('/produtos/store', [ProductController::class, 'listProduct'])->name('product.list');
Route::post('produtos/store', [ProductController::class, 'product.card'])->name('product.card');
