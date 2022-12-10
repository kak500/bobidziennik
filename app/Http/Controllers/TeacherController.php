<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function list()
    {
        return view('admin.teacherList', ['teachers'=>Teacher::all()]);
    }
}