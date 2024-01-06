<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ItemController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//category
Route::get('category', [CategoryController::class, 'index']);

Route::post('createCategory', [CategoryController::class, 'create']);

Route::get('deleteCategory/{id}', [CategoryController::class, 'delete']);

Route::get('editCategory/{id}', [CategoryController::class, 'edit']);

Route::post('updateCategory/{id}', [CategoryController::class, 'update']);

//item
Route::get('item', [ItemController::class, 'index']);

Route::post('createItem', [ItemController::class, 'create']);

Route::get('deleteItem/{id}', [ItemController::class, 'delete']);

Route::get('editItem/{id}', [ItemController::class, 'edit']);

Route::post('updateItem/{id}', [ItemController::class, 'update']);
