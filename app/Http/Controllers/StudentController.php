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

    //method untuk menampilkan halaman edit
    public function edit($id)
    {
        //cari data student berdasarkan id
        $student = Student::find($id);

        return view('admin.contents.student.edit', [
            'student' => $student
        ]);
    }

    //method menyimpan hasil update
    public function update($id, Request $request)
    {
        //cari data student berdasarkan id
        $student = Student::find($id); // select * from students where id = $id;

        //validasi data yang diterima
        $request->validate([
            'name' => 'required',
            'nim' => 'required|numeric',
            'major' => 'required',
            'class' => 'required',
        ]);

        //simpan perubahan
        $student->update([
            'name' => $request->name,
            'nim' => $request->nim,
            'major' => $request->major,
            'class' => $request->class,

        ]);

        //kembalikan ke halaman student
        return redirect('admin/student')->with('message', 'Data student berhasil diedit!');
    }

    //method menghapus student
    public function destroy($id){
        $student = Student::find($id); // select * from students where id = $id;

        //hapus student
        $student->delete();
        
        //kembalikan ke halaman student
        return redirect('admin/student')->with('message', 'Data student berhasil dihapus!');

    }
}
