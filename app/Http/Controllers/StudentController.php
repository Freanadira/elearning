<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //method untuk menampilkan data student
    public function index()
    {
        // tarik data student dari db
        $students = Student::all();

        //panggil view dan kirim data students
        return view('admin.contents.student.index', [
            'students' => $students,
        ]);
    }

    //method untuk menampilkan form tambah student
    public function create()
    {
        return view('admin.contents.student.create');
    }

    //menyimpan data student baru
    public function store(Request $request)
    {
        //dd = kodingan setelahnya gaakan dijalankan
        //dd($request->all());

        //validasi data yang diterima
        $request->validate([
            'name' => 'required',
            'nim' => 'required|numeric',
            'major' => 'required',
            'class' => 'required',
        ]);
        //simpan data ke db
        Student::create([
            'name' => $request->name,
            'nim' => $request->nim,
            'major' => $request->major,
            'class' => $request->class,
        ]);

        //redirect ke halaman student
        return redirect('admin/student')->with('message', 'Data student berhasil ditambahkan!');
    }
}
