<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class StudentFormController extends Controller
{
    public function generateForm()
    {
        $role = new Role();
        return view('studentAdd', ['roles'=>$role->all()]);
    }
}