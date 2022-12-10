<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class MarkController extends Controller
{
    public function add()
    {
        $students = Student::all();
        $subjects = Subject::all();
        return view('marks.markForm', ['students' => $students, 'subjects'=>$subjects]);
    }

    public function validateForm(Request $request)
    {
        $request->validate([
            'student' => 'required',
            'subject' => 'required',
            'value' => 'required',
        ],
        [
            'student.required' => 'Należy wybrać ucznia',
            'subject.required' => 'Należy wybrać przedmiot',
            'value.required' => 'Należy wybrać ocenę'
        ]
    );

        $student = Student::where('id', $request->input("student"))->first();
        $subject = Subject::where('id', $request->input("subject"))->first();
        $mark = new Mark();
        $mark->student_id = $request->input("student");
        $mark->subject_id = $request->input("subject");
        $mark->teacher_id = Auth::user()->id;
        $mark->value = $request->input("value");
        $mark->save();
        $details = [
            'title' => 'Powiadomienie o nowej ocenie',
            'mark' => $request->input("value"),
            'subject' => $subject->subject_name,
            'teacher' => Auth::user()->name . ' ' . Auth::user()->surname
        ];
        Mail::to($student->email)->send(new \App\Mail\TestMail($details));
        return redirect()->back()->with('message', 'Dodano nową ocenę');
    }

    public function list()
    {
        $student = Student::where('user_id', Auth::user()->id)->first();
        $marks = DB::table('marks')->select('subjects.subject_name', 'marks.value', 'marks.created_at')
        ->join('students', 'students.id', '=', 'marks.student_id')
        ->join('subjects', 'subjects.id', '=', 'marks.subject_id')
        ->where('marks.student_id', $student->id)->get();
        return view('marks.marksList', ['marks'=>$marks]);
    }
}
