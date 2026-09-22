<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Tugas 9 — Resource Route
|--------------------------------------------------------------------------
|
| GET       /products              → index()
| GET       /products/create       → create()
| POST      /products              → store()
| GET       /products/{product}    → show()
| GET       /products/{product}/edit → edit()
| PUT       /products/{product}    → update()
| DELETE    /products/{product}    → destroy()
|
*/

Route::get('/', fn () => redirect()->route('products.index'));

Route::resource('products', ProductController::class);