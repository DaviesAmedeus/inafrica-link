<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\TourPostController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/link-storage', function () {
    Artisan::call('storage:link');
    return 'Storage link created successfully.';
});


/* --- STATIC ROUTES --- */
Route::controller(HomeController::class)->group(function(){
    Route::get('/', 'index')->name('home');
    //Route::get('/about', 'about')->name('about'); //page not yet created
});


/* --- ROUTES CONTROLLING THE TOURS --- */
Route::controller(TourController::class)->group(function () {
    Route::get('/tours/category/{slug}', 'categoryTours')->name('category_tours'); //display selected category tours
    Route::get('/tour/{slug}', 'readTour')->name('read_tour');
});



/* --- ADMIN ROUTES --- */
Route::prefix('admin')->name('admin.')->group(function () {

    Route::middleware(['guest', 'preventBackHistory'])->group(function () {
        Route::controller(AuthController::class)->group(function () {
            Route::get('/login', 'loginForm')->name('login'); // This route displays the login form
            Route::post('/login', 'loginHandler')->name('login_handler'); // This route handles the login

            /* ---These Routes Handles if the user has forgot the password --- */
            Route::get('/forgot-password', 'forgotForm')->name('forgot');
            Route::post('/send-password-reset-link', 'sendPasswordResetLink')->name('send_password_reset_link');
            Route::get('/password/reset/{token}', 'resetForm')->name('reset_password_form');
            Route::post('/reset-password-handler', 'resetPasswordHandler')->name('reset_password_handler');
        });
    });


    Route::middleware(['auth', 'preventBackHistory'])->group(function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get('/dashboard', 'adminDashboard')->name('dashboard');
            Route::post('/logout', 'logoutHandler')->name('logout'); // This route handles the logout process

            Route::get('/profile', 'profileView')->name('profile');
            Route::post('/update-profile-picture', 'updateProfilePicture')->name('update_profile_picture');

            //Routes to only be accessed only by superAdmin
            Route::middleware('onlySuperAdmin')->group(function () {
                Route::get('/settings', 'generalSettings')->name('settings');
                Route::post('/update-light-mode-logo', 'updateLightModeLogo')->name('update_light_mode_logo');
                Route::post('/update-dark-mode-logo', 'updateDarkModeLogo')->name('update_dark_mode_logo');

                Route::post('/update-favicon', 'updateFavicon')->name('update_favicon');
                Route::get('/categories', 'categoriesPage')->name('categories');
            });
        });
    });

    // Tour CRUD routes
    Route::controller(TourPostController::class)->group(function () {
        Route::get('/tour/new', 'addTour')->name('add_tour');
        Route::post('/tour/create', 'createTour')->name('create_tour');
        Route::get('/tours', 'allTours')->name('tours');
        Route::get('/tour/{id}/edit', 'editTour')->name('edit_tour');
        Route::post('/tour/{tour_id}/update', 'updateTour')->name('update_tour');
    });
});
