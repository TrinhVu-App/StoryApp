<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\ClickAble;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/lmao', function (Request $request) {
    return $request->key1.' '.$request->key2;
});

Route::get('/testing', function() {
    return view('testing', [
        'key1' => 'value1',
        'ClickAbleLists' => ClickAble::onClick()
    ]);
});

