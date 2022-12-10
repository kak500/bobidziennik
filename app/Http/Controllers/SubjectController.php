<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function list()
    {
        return view('subjectList', ['subjects'=>Subject::all()]);
    }

    public function add(Request $request)
    {
        $subject = new Subject();
        $subject->subject_name = $request->input('subject_name');
        $subject->save();
        return redirect()->back()->with('message', 'Dodano nowy przedmiot');
    }
}