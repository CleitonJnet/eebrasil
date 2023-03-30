<?php

namespace App\Http\Livewire\System\Church;

use App\Models\Church;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.system.church.index', [
            'churches' => Church::orderBy('name')->get()
        ]);
    }
}
