<?php

use App\Http\Controllers\categoryController;
use App\Http\Controllers\proveAloneController;
use App\Http\Controllers\proveCategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/consultAllcategories', [categoryController::class, 'index']);

// ProveCategory
Route::get('/consultAllproveCategory', [proveCategoryController::class, 'FilterAllCategories']);
Route::post('/createProveCategory', [proveCategoryController::class, 'createProveCategory']);
Route::post('/updateProveCategory', [proveCategoryController::class, 'updateProveCategory']);
Route::post('/changeState', [proveCategoryController::class, 'changeState']);


Route::get('/consultAllproveAlone', [proveAloneController::class, 'FilterAllAlone']);
Route::post('/createProveAlone', [proveAloneController::class, 'createProveAlone']);
Route::post('/updateProveAlone', [proveAloneController::class, 'updateProveAlone']);
Route::post('/updateProveAlone', [proveAloneController::class, 'updateProveAlone']);
Route::post('/changeproveState', [proveAloneController::class, 'changeproveState']);