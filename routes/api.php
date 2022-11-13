<?php

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

//Route::get("bookables", function (Request $request){
//    return Bookable::all();
//});
//
//Route::get('bookables/{id}', function (Request $request, $id){
//    return Bookable::findOrFail($id);
//});

//Route::get("bookables", "App\Http\Controllers\Api\BookableController@index");
//Route::get("bookables/{id}", "App\Http\Controllers\Api\BookableController@show");

Route::apiResource("bookables", "App\Http\Controllers\Api\BookableController")->only(["index", "show"]);
Route::get("bookables/{bookable}/availability", "App\Http\Controllers\Api\BookableAvailabilityController")
        ->name("bookables.availability.show");
