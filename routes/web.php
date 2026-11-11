<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CodingMentorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectCategoryController;
use App\Http\Controllers\ProjectDetailController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);
Route::get('/projects/coding-mentor', [CodingMentorController::class, 'index']);
Route::get('/projects/{projectCategory:slug}/{project:slug}', [ProjectDetailController::class, 'show']);
Route::get('/projects/{projectCategory:slug}', [ProjectCategoryController::class, 'show']);
