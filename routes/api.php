<?php

use App\Http\Controllers\categoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/consultAllcategories', [categoryController::class, 'index']);