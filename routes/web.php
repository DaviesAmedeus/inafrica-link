<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::view('/',  'front.pages.index')->name('home');
Route::view('/tours/category/luxury-safaris',  'front.pages.luxury_safaris')->name('luxurysafaris');
Route::view('/tour/3-day-luxury-safari',  'front.pages.single_tour')->name('single_tour');



