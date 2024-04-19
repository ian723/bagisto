<?php

namespace App\Http\Controllers;
use App\Http\Controllers\CalculatorApiController;

use Illuminate\Support\Facades\Route;


Route::get('/register', 'RegistrationController@create');
Route::post('register', 'RegistrationController@store');

Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');
Route::post('/calculate', [CalculatorApiController::class, 'calculate']);


