<?php

namespace App\Http\Livewire\System\Ojt;

use App\Models\Ojt;
use App\Models\Training;
use Livewire\Component;

class Index extends Component
{
    public $event;

    public function mount(Training $event){
        $this->event = $event;
    }


    public function render()
    {
        return view('livewire.system.ojt.index',[
            'ojts' => Ojt::where('training_id',$this->event->id)->get()
        ]);
    }
}
