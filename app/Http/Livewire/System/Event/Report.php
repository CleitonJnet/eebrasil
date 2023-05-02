<?php

namespace App\Http\Livewire\System\Event;

use App\Models\Role;
use App\Models\Training;
use App\Models\User;
use Livewire\Component;

class Report extends Component
{
    public $year;
    public $trainings;

    public function mount($year){
        $this->year = $year;
        if($this->year != 'all'){
            $this->trainings = Training::whereYear('date',$year)->get();
        }else {
            $this->trainings = Training::all();
        }
    }

    public $chartData = [
        'labels' => ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        'datasets' => [
          [
            'label' => 'Sales',
            'data' => [12, 19, 3, 5, 2, 3, 9],
            'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
            'borderColor' => 'rgba(255, 99, 132, 1)',
            'borderWidth' => 1
          ]
        ]
      ];

    public function render()
    {
        return view('livewire.system.event.report',[
            'listTeachers' => Role::find(6)->users()->orderBy('name')->SimplePaginate( $perPage = 4, $columns = ['*'], $pageName = "ListTeachers" )
        ]);
    }
}
