<?php

namespace App\Http\Livewire\System\People;

use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public $profile;

    public function mount(User $profile){
        $this->profile = $profile;
    }

    public function render()
    {
        return view('livewire.system.people.edit');
    }
}
