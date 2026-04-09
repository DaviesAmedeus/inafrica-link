<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::view('/',  'front.pages.index')->name('home');
Route::view('/tours/category/luxury-safaris',  'front.pages.luxury_safaris')->name('luxurysafaris');
Route::view('/tour/3-day-luxury-safari',  'front.pages.single_tour')->name('single_tour');



  Route::prefix('admin')->name('admin.')->group(function(){
    Route::controller(AdminController::class)->group(function () {
            Route::get('/dashboard', 'adminDashboard')->name('dashboard');
            // Route::post('/logout', 'logoutHandler')->name('logout');
            // Route::get('/profile', 'profileView')->name('profile');
            // Route::post('/update-profile-picture', 'updateProfilePicture')->name('update_profile_picture');


            // Route::get('/settings', 'generalSettings')->name('settings');
            // Route::post('/update-logo', 'updateLogo')->name('update_logo');
            // Route::post('/update-favicon', 'updateFavicon')->name('update_favicon');
            // Route::get('/categories', 'categoriesPage')->name('categories');


        });

  });


