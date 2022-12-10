<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role == 1) {
            $student = Student::where('user_id', Auth::user()->id)->first();
            $marks = DB::table('marks')->select('subjects.subject_name', 'marks.value', 'marks.created_at')
            ->join('students', 'students.id', '=', 'marks.student_id')
            ->join('subjects', 'subjects.id', '=', 'marks.subject_id')
            ->where('marks.student_id', $student->id)->orderByDesc('marks.created_at')->get();
            return view('layouts.studentHome', ['marks'=>$marks]);
        }
        else{
            return view('home');

        }
    }
}