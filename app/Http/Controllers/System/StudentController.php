<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function index($id){
        return view('system.student.index', compact('id'));
    }
    public function create($id){
        return view('system.student.create', compact('id'));
    }
}
