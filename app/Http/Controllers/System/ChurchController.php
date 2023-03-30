<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;

class ChurchController extends Controller
{
    public function index(){
        return view('system.church.index');
    }
    public function create(){
        return view('system.church.create');
    }
    public function view($id){
        return view('system.church.view',compact('id'));
    }
    public function edit($id){
        return view('system.church.edit',compact('id'));
    }
}
