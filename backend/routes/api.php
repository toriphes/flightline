<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Airport;

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

Route::get('airports', function () {
    return Airport::all();
});

Route::get('flight/search', function (\App\Http\Requests\FlightSearchRequest $request) {


    return \App\Models\Flight::findCheaperRoute(
        $request->get('departure'),
        $request->get('arrival'),
        $request->get('stops', 0)
    );
});
