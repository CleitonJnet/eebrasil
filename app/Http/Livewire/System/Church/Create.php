<?php

namespace App\Http\Livewire\System\Church;

use App\Models\Church;
use Livewire\Component;

class Create extends Component
{
    public $church;

    public function mount(Church $church){
        $this->church = $church;
    }

    public function render()
    {
        return view('livewire.system.church.create');
    }
}
