<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //
    public function index(){
        $courses = Course::all();

        return view('admin.contents.course.index', [
            'courses' => $courses
        ]);
    }

    //method menampilkan tambah course
    public function create()
    {
        return view('admin.contents.course.create');
    }

    
    //menyimpan data course baru
    public function store(Request $request)
    {
        //validasi data yang diterima
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
        ]);
        //simpan data ke db
        Course::create([
            'name' => $request->name,
            'category' => $request->category,
            'description' => $request->description,
        ]);

        //redirect ke halaman course
        return redirect('admin/course')->with('message', 'Data course berhasil ditambahkan!');
    }

    
    //method untuk menampilkan halaman edit
    public function edit($id)
    {
        //cari data course berdasarkan id
        $course = Course::find($id);

        return view('admin.contents.course.edit', [
            'course' => $course
        ]);
    }

    //method menyimpan hasil update
    public function update($id, Request $request)
    {
        //cari data course berdasarkan id
        $course = Course::find($id); // select * from courses where id = $id;

        //validasi data yang diterima
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
        ]);

        //simpan perubahan
        $course->update([
            'name' => $request->name,
            'category' => $request->category,
            'description' => $request->description,

        ]);

        //kembalikan ke halaman course
        return redirect('admin/course')->with('message', 'Data course berhasil diedit!');
    }

    //method menghapus course
    public function destroy($id){
        $course = Course::find($id); // select * from courses where id = $id;

        //hapus course
        $course->delete();
        
        //kembalikan ke halaman course
        return redirect('admin/course')->with('message', 'Data course berhasil dihapus!');

    }
}


