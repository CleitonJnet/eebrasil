<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        if (session('login-role') == "1") {
            $navigator = 'office';
        }elseif (session('login-role') == "3") {
            $navigator = 'teacher';
        }else{
            $navigator = 'fieldworker';
        }

        // dd($navigator);
        return view('layouts.app', compact('navigator'));
    }
}
