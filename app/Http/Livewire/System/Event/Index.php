<?php

namespace App\Http\Livewire\System\Event;

use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $year;

    public function mount($year){
        $this->year = $year;
    }

    public function render()
    {
        return view('livewire.system.event.index');
    }
}
