<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShareController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;

Route::apiResource('/share', ShareController::class);
Route::apiResource('/comment', CommentController::class);
Route::post('/like', [LikeController::class, 'createOrDestroy']);