<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;

class MinisteryController extends Controller
{
    public function index(){
        return view('system.ministery.index');
    }
    public function create(){
        return view('system.ministery.create');
    }
    public function view($id){
        return view('system.ministery.view',compact('id'));
    }
    public function edit($id){
        return view('system.ministery.edit',compact('id'));
    }
}
