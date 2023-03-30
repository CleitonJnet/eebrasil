<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Models\Training;

class EventController extends Controller
{
    public function index($year = null){
        $year = ($year == null) ? $year = date('Y') : $year;
        $current_year = date('Y');
        $last_year = date('Y') -1;
        $previous_years = date('Y') -2;
        $training_current_year  = Training::whereYear('date', $current_year)->count();
        $training_last_year     = Training::whereYear('date', $last_year)->count();
        $training_previous_year = Training::whereYear('date', $previous_years)->count();
        $training_all_years = Training::selectRaw('YEAR(date) as year')->distinct()->orderBy('year', 'desc')->pluck('year')->count();

        return view('system.event.index',compact('training_current_year','training_last_year','training_previous_year','training_all_years','year'));
    }
    public function create(){
        return view('system.event.create');
    }
    public function view($id){
        return view('system.event.view',compact('id'));
    }
    public function edit($id){
        return view('system.event.edit',compact('id'));
    }
}
