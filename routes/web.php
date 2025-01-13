<?php

use App\Http\Controllers\MilestoneController;
use App\Http\Controllers\GrantController;
use App\Http\Controllers\AcademicianController;
use App\Models\Grant;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserProfileController;

Route::get('/profile', [UserProfileController::class, 'profile'])->name('user.profile')->middleware('auth');

Route::get('/', function () {
    return view('homepage');
});

Route::get('/homepage', function () {
    return view('homepage');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('grant', GrantController::class);
Route::resource('milestone', MilestoneController::class);
Route::resource('academician', AcademicianController::class);

Route::get('/milestone/create/{grant_id}', [MilestoneController::class, 'create'])->name('milestone.create');

// Many to Many MVC
Route::post('grants/{grant}/academicians', [GrantController::class, 'addLeader'])->name('grant.addLeader');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/grant/{grant}/add-member', [GrantController::class, 'addMember'])->name('grant.addMember');
Route::delete('/grant/{grant}/remove-member/{academician}', [GrantController::class, 'removeMember'])->name('grant.removeMember');

Route::get('/grant/{grant}/select-member', [GrantController::class, 'selectMember'])->name('grant.selectMember');

