<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StudentsController extends Controller
{
    public function index():View{
        $students = Student::all();
        return view('students.index', ['students'=>$students]);
    }
}
