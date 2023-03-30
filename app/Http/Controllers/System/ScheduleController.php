<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;

class ScheduleController extends Controller
{
    public function index($id){
        return view('system.schedule.index', compact('id'));
    }
}
