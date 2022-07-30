<?php

use Illuminate\Support\Facades\Route;
use App\Models\Flight;
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

Route::get('flights', function () {
    return Flight::all();
});

Route::get('flights/search', function (\App\Http\Requests\FlightSearchRequest $request) {


    return Flight::findCheaperRoute(
        $request->get('departure'),
        $request->get('arrival'),
        $request->get('stops', 0)
    );
});
