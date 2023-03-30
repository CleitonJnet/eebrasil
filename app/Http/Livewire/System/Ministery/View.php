<?php

namespace App\Http\Livewire\System\Ministery;

use App\Models\Ministry;
use Livewire\Component;

class View extends Component
{
    public $ministery;

    public function mount(Ministry $ministery){
        $this->ministery = $ministery;
    }

    public function render()
    {
        return view('livewire.system.ministery.view');
    }
}
