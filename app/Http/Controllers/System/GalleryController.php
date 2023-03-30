<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;

class GalleryController extends Controller
{
    public function index($id){
        return view('system.gallery.index',compact('id'));
    }
}
