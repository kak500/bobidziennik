<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Student;
use App\Models\Teacher;

class UserController extends Controller
{
    public function list()
    {
        // $user = new User();
        $users = DB::table('users')->select('users.id', 'users.name', 'users.surname', 'users.email', 'roles.id as role_id', 'roles.role_name')->join('roles', 'roles.id', '=', 'users.role')->orderBy('users.id')->get();
        return view('userList', ['users'=>$users->all()]);
    }

    public function edit($id)
    {
        $user = DB::table('users')->select('users.id', 'users.name', 'users.surname', 'users.email', 'roles.id as role_id', 'roles.role_name')->join('roles', 'roles.id', '=', 'users.role')->where('users.id', $id)->get();
        return view('editUserForm', ['user'=>$user]);
    }

    public function editUser(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->email = $request->input('email');
        $user->save();

        switch ($request->input('role')) {
            case 1:
                $student = Student::where('user_id', $id)->first();
                $student->name = $request->input('name');
                $student->surname = $request->input('surname');
                $student->email = $request->input('email');
                $student->save();
                break;

            case 2:
                $teacher = Teacher::where('user_id', $id)->first();
                $teacher->name = $request->input('name');
                $teacher->surname = $request->input('surname');
                $teacher->email = $request->input('email');
                $teacher->save();
                break;
            
            default:
                # code...
                break;
        }

        
        return redirect('/userList');
    }

    public function del($id)
    {
        $user = User::where('id', $id)->first();

        switch ($user->role) {
            case 1:
                $student = Student::where('user_id', $id)->first()->delete();
                break;
            
            case 2:
                $teacher = Teacher::where('user_id', $id)->first()->delete();
                break;
            
            default:
                # code...
                break;
        }
        $user->delete();
        return redirect('/userList');
    }
}
