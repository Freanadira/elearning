<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
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

//route untuk menampilkan student
Route::get('admin/student', [StudentController::class, 'index']);

Route::get('admin/course', [CourseController::class, 'index']);