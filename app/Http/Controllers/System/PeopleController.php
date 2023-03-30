<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;

class PeopleController extends Controller
{
    public function index(){
        return view('system.people.index');
    }
    public function create(){
        return view('system.people.create');
    }
    public function view($id){
        return view('system.people.view',compact('id'));
    }
    public function edit($id){
        return view('system.people.edit',compact('id'));
    }
}
