<?php

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/

// Authentication Routes
Route::get('login', 'Auth\LoginController@showLoginForm')
    ->name('login');

Route::post('login', 'Auth\LoginController@login')
    ->name("login.post");

Route::post('logout', 'Auth\LoginController@logout')
    ->middleware(['auth'])
    ->name('logout.post');


// Registration Routes
Route::get('register', 'Auth\RegisterController@showRegistrationForm')
    ->name('register');

Route::post('register', 'Auth\RegisterController@register')
    ->name("register.post");

// Password Reset Routes...
Route::prefix('password')->group(function () {
    Route::get('reset', 'Auth\ForgotPasswordController@showLinkRequestForm')
        ->name('password.request');

    Route::post('email', 'Auth\ForgotPasswordController@sendResetLinkEmail')
        ->name('password.email');

    Route::get('reset/{token}', 'Auth\ResetPasswordController@showResetForm')
        ->name('password.reset');

    Route::post('reset', 'Auth\ResetPasswordController@reset')
        ->name("password.reset.post");
});