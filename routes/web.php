<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//menampilkan teks salam
Route::get('/salam',function(){
    return "Assalamualaikum....";
});

//routing profil
Route::get('/profile',function(){
    return view('profile');
});

Route::get('admin/dashboard', [DashboardController::class, 'index']);