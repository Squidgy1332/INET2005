<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
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


Route::get('items/itemCreate', [ItemController::class, 'itemCreate'])->name("ItemCreate");
Route::post('items/itemStore', [ItemController::class, 'itemStore']);
Route::patch('items/update/{id}', [ItemController::class, 'update']);
Route::get('items/itemEdit/{id}', [ItemController::class, 'itemEdit'])->name("itemEdit");
Route::get('items/delete/{id}', [ItemController::class, 'delete'])->name("delete");
Route::get('items/index', [ItemController::class, 'item'])->name("item");

Route::get('/categories/create', [CategoryController::class, 'create'])->name("create");
Route::patch('/categories/store', [CategoryController::class, 'store']);
Route::patch('/categories/update/{id}', [CategoryController::class, 'update']);
Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name("edit");
Route::get('/categories',[CategoryController::class, 'index'])->name("index");