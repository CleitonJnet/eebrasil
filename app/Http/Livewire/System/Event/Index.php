<?php

namespace App\Http\Livewire\System\Event;

use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $year;
    public $status = 2;

    public function mount($year){
        $this->year = $year;
    }

    public function mode_list($value){
        session(['modeList'=> $value]);
    }

    public function list_actual($status){ $this->status = $status; }

    public function render()
    {
        if($this->year == date('Y', strtotime('-1 year')) || $this->year == date('Y', strtotime('-2 year')) )
        { $this->status = 3; }

        return view('livewire.system.event.index');
    }
}
