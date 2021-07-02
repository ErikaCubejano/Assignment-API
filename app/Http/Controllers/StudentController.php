<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Student;

class StudentController extends Controller
{
    public function index()
    {
         $students = json_decode(Http::get('https://intechtestapi.herokuapp.com/api/getStudents')->body(),true);
         return view('welcome', compact('students'));
    }

    public function store(Request $request)
    {
        $response = Http::post('https://intechtestapi.herokuapp.com/api/addNewStudent', $request->all())->body();
        $response = json_decode($response, true);

        return redirect(route('student.index'))->with('success', sprintf("%s added to database via API.", $response['name']));
    }

    public function edit(Request $editStudentng)
    {
        $editStudentng = ([
            'id'=> $editStudentng -> id,
            'name' => $editStudentng -> name,
            'grade' => $editStudentng ->grade
        ]);

        return view('edit', compact('editStudentng'));
    }

    public function update(Request $request)
    {
        $request = ([
            'id'=> $request -> id,
            'name' => $request -> name,
            'grade' => $request ->grade
        ]);

        $response = Http::put('https://intechtestapi.herokuapp.com/api/updateStudent', $request)->body();
        $response = json_decode($response, true);

        return redirect(route('student.index'));
    }

    public function destroy(Request $request){
        $studentfordelete = ([
            'id'=> $request -> id
        ]);

        $response = Http::delete('https://intechtestapi.herokuapp.com/api/deleteStudent', $studentfordelete)->body();
        $response = json_decode($response, true);

        return redirect(route('student.index'));

    }

}
