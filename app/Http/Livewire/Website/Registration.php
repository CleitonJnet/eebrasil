<?php

namespace App\Http\Livewire\Website;

use App\Models\Training;
use Livewire\Component;
use Livewire\WithPagination;

class Registration extends Component
{
    use WithPagination;

    public $event;
    public $step;

    public function mount(Training $event){
        $this->event = $event;
    }

    public function defineStep($v){
        $this->step = $v;
    }

    public function render()
    {
        return view('livewire.website.registration');

    }
}
