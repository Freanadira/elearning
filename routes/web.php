<?php

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