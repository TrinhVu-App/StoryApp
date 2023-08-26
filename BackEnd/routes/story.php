<?php

use App\Http\Controllers\AudioController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\TouchableController;
use Illuminate\Support\Facades\Route;

//putting page routing before story routing cuz 4head

//routing for Audio listing/details
Route::get('/audio/', [AudioController::class, 'index']);
Route::get('/audio/{id}', [AudioController::class, 'show']);

//routing for Image Listing/details
Route::get('/image', [ImageController::class, 'index']);
Route::get('/image/{id}', [ImageController::class, 'show']);



//routing for touchables
Route::get('/page/touchable/', [TouchableController::class, 'index']);
Route::get('/page/touchable/{id}', [TouchableController::class, 'show']);
Route::get('/page/touchable/pageID/{id}', [TouchableController::class, 'showByPageID']);
Route::post('/page/touchable/create', [TouchableController::class, 'store']);
Route::post('/page/touchable/{id}/edit', [TouchableController::class, 'edit']);
Route::put('/page/touchable/{id}/edit', [TouchableController::class, 'update']);
Route::delete('/page/touchable/{id}/delete', [TouchableController::class, 'destroy']);


//routing for page
Route::get('/page/', [PageController::class, 'index']);
Route::get('/page/{id}', [PageController::class, 'show']);
Route::get('/page/storyID/{id}', [PageController::class, 'showByStoryID']);
Route::post('/page/create', [PageController::class, 'store']);
Route::post('/page/{id}/edit', [PageController::class, 'edit']);
Route::put('/page/{id}/edit', [PageController::class, 'update']);
Route::delete('/page/{id}/delete', [PageController::class, 'destroy']);

//routing for story
Route::get('/', [StoryController::class, 'index']);
Route::get('/{id}', [StoryController::class, 'show']);
Route::post('/create', [StoryController::class, 'store']);
Route::post('/{id}/edit', [StoryController::class, 'edit']);
Route::put('/{id}/edit', [StoryController::class, 'update']);
Route::delete('/{id}/delete', [StoryController::class, 'destroy']);
Route::get('/full/{id}', [StoryController::class, 'getFull']);

//routing for Images listing/details


