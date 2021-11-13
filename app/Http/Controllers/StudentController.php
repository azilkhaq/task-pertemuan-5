<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {

        $students = Student::all();

        $data = [
            'message' => 'Get all students',
            'data' => $students
        ];

        return response()->json($data, 200);
    }

    public function create(Request $request)
    {
        $nama = $request->nama;
        $nim = $request->nim;
        $email = $request->email;
        $jurusan = $request->jurusan;

        $students = Student::create([
            'nama' => $nama,
            'nim' => $nim,
            'email' => $email,
            'jurusan' => $jurusan
        ]);

        $data = [
            'message' => 'Student is created successfuly',
            'data' => $students
        ];

        return response()->json($data, 201);
    }

    function update(Request $request, $id)
    {
        $nama = $request->nama;
        $nim = $request->nim;
        $email = $request->email;
        $jurusan = $request->jurusan;

        $students = Student::find($id);

        $students->update(
            [
                'nama' => $nama,
                'nim' => $nim,
                'email' => $email,
                'jurusan' => $jurusan
            ]
        );

        $data = [
            'message' => 'Student is updated successfuly',
            'data' => $students
        ];

        return response()->json($data, 200);
    }

    function destroy($id)
    {
        $students = Student::find($id);

        $students->delete();

        $data = [
            'message' => 'Student is deleted successfuly',
            'data' => $students
        ];

        return response()->json($data, 200);
    }
}
