<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';

    //mendefinisikan kolom yang boleh dimodifikasi
    protected $fillable = ['name', 'category', 'description'];
}
