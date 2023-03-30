<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;

class OjtController extends Controller
{
    public function index($id){
        return view('system.ojt.index',compact('id'));
    }

    public function create($id){
        return view('system.ojt.create',compact('id'));
    }
}
