<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\ProfileController;


// All Routes for User Profile

Route::prefix('profile')->group(function(){

    Route::get('/view', [ProfileController::class, 'ProfileView'])
        ->name('profile.view');
    
    Route::get('/edit', [ProfileController::class, 'ProfileEdit'])
        ->name('profile.edit');
    
    Route::post('/store', [ProfileController::class, 'ProfileStore'])->
        name('profile.store');
    
    Route::get('/password/view', [ProfileController::class, 'PasswordView'])
        ->name('password.view');
    
    Route::post('/password/update', [ProfileController::class, 'PasswordUpdate'])
        ->name('password.update');
    
}); 