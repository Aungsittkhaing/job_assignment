<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
// use App\Http\Controllers\ItemController;
use App\Http\Controllers\ItemsController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->prefix('dashboard')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/createcategory', [CategoryController::class, 'createview'])->name('createcategory');
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::post('/createCategory', [CategoryController::class, 'create'])->name('createCategory');
    Route::get('/editCategory/{id}', [CategoryController::class, 'edit'])->name('editCategory');
    Route::get('/deleteCategory/{id}', [CategoryController::class, 'delete'])->name('deleteCategory');
    Route::post('/updateCategory/{id}', [CategoryController::class, 'update'])->name('updateCategory');

    Route::get('/item', [ItemController::class, 'index'])->name('item.index');
    Route::get('/createitem', [ItemController::class, 'createview'])->name('createitem');
    Route::post('/createItem', [ItemController::class, 'create'])->name('createItem');
    Route::get('/editItem/{id}', [ItemController::class, 'edit'])->name('editItem');
    Route::post('/updateItem/{id}', [ItemController::class, 'update'])->name('updateItem');
    Route::get('/deleteItem/{id}', [ItemController::class, 'delete'])->name('deleteItem');
});
