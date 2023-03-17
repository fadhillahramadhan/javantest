<?php

use Illuminate\Support\Facades\Route;

use App\Models\Family;

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
    $families = Family::with([
        'children' => function ($query) {
            $query->with('children');
        }
    ])->where('parent_id', null)->get();

    return view('welcome', compact('families'));
});
