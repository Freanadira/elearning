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

//route untuk menampilkan halaman form tambah student
Route::get('admin/student/create', [StudentController::class, 'create']);

//kirim data student baru
Route::post('admin/student/store', [StudentController::class, 'store']);

//menampilkan halaman form edit student
Route::get('admin/student/edit/{id}', [StudentController::class, 'edit']);

//menyimpan hasil update student
Route::put('admin/student/update/{id}', [StudentController::class, 'update']);

//untuk menghapus student
Route::delete('admin/student/delete/{id}', [StudentController::class, 'destroy']);

//route untuk menampilkan course
Route::get('admin/course', [CourseController::class, 'index']);


