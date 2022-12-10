<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class StudentController extends Controller
{
    public function add(Request $request)
    {
        $request->validate([
            'email' => 'required | email | min:5 | max:50',
            'name' => 'required | min:3 | max:30',
            'surname' => 'required | min:3 | max:50',
            'password' => 'required | min:3 | max:50',
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role = $request->input('role');
        $user->save();

           switch ($request->input('role')) {
            case 1:
                $student = new Student();
                $student->name = $request->input('name');
                $student->surname = $request->input('surname');
                $student->email = $request->input('email');
                $student->user_id = $user->id;
                $student->save();
                break;

            case 2:
                $teacher = new Teacher();
                $teacher->name = $request->input('name');
                $teacher->surname = $request->input('surname');
                $teacher->email = $request->input('email');
                $teacher->user_id = $user->id;
                $teacher->subject_id = 0;
                $teacher->save();
                break;
            
            default:
                # code...
               break;
           }

        return redirect('/userList');
    }

    public function list()
    {
        return view('studentsList', ['students'=>Student::all()]);
    }

    public function profile($id)
    {
        $student = Student::where('id', $id)->first();
        $marks = DB::table('marks')->select('subjects.subject_name', 'marks.value', 'marks.created_at')
        ->join('students', 'students.id', '=', 'marks.student_id')
        ->join('subjects', 'subjects.id', '=', 'marks.subject_id')
        ->where('marks.student_id', $student->id)->orderByDesc('marks.created_at')->get();
        return view('studentProfile', ['marks'=>$marks, 'student'=>$student]);
    }
}