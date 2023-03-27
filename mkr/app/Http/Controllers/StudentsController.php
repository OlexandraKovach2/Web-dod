<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StudentsController extends Controller
{
    public function index(Request $request):View{
        if(!$request->query->get('id')){
            $students = Student::all();
        }
        else{
            $students = Student::whereRaw('price < ?', $request->query->get('price'))->get();
        }
        return view('students.index', ['students'=>$students]);
    }
    public function edit(Request $request, int $id):View{
        $student = Student::where('id', $id)->get();
        return view('students.edit', ['id'=>$id, 'student'=>$student]);
    }
    public function update(Request $request, Student $student): RedirectResponse{
        $student->update([
            'name' => $request->input('name'),
            'course' => $request->input('course'),
            'specialty' => $request->input('specialty')
            ]
        );
        return redirect(route('students.index'));
    }
    public function show(): RedirectResponse{
        return redirect(route('students.index'));
    }
}
