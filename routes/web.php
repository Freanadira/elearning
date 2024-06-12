<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');

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

//---------------------------------------------------------------------------------------------

//route untuk menampilkan course
Route::get('admin/course', [CourseController::class, 'index']);

//route untuk menampilkan halaman form tambah course
Route::get('admin/course/create', [CourseController::class, 'create']);

//kirim data course baru
Route::post('admin/course/store', [CourseController::class, 'store']);

//menampilkan halaman form edit course
Route::get('admin/course/edit/{id}', [CourseController::class, 'edit']);

//menyimpan hasil update course
Route::put('admin/course/update/{id}', [CourseController::class, 'update']);

//untuk menghapus course
Route::delete('admin/course/delete/{id}', [CourseController::class, 'destroy']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
