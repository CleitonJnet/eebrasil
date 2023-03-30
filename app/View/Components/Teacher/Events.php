<?php

namespace App\View\Components\Teacher;

use App\Models\Course;
use App\Models\Role;
use App\Models\Training;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Events extends Component
{
    public $trainings;
    public $year;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($year)
    {
        $this->year = $year;

        if($this->year != 'all'){
            $this->trainings = Training::whereYear('date',$year)->get();
        }else {
            $this->trainings = Training::all();
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        if($this->year != 'all'){
            // Lista usuários que tem algum treinamento cadastrado para eles como professores
            $teachers = User::whereIn('id', function ($query) {
                $query->select('user_id')->from('trainings')->whereYear('date', $this->year)->groupBy('user_id')->havingRaw('COUNT(*) > 0');
            })
            // Lista usuários que estão vinculados como professores
            ->whereIn('id', function ($query) {
                $query->select('user_id')->from('role_user')->whereIn('role_id', function ($query) {
                    $query->select('id')->from('roles')->where('id', 6);
                });
            })
            ->orderBy('name')->get();
        }else{

            // dd($this->year);
            // Lista usuários que tem algum treinamento cadastrado para eles como professores
            $teachers = User::whereIn('id', function ($query) {
                $query->select('user_id')->from('trainings')->groupBy('user_id')->havingRaw('COUNT(*) > 0');
            })
            // Lista usuários que estão vinculados como professores
            ->whereIn('id', function ($query) {
                $query->select('user_id')->from('role_user')->whereIn('role_id', function ($query) {
                    $query->select('id')->from('roles')->where('id', 6);
                });
            })
            ->orderBy('name')->get();

        }

        return view('components.teacher.events',[
            'courses' => Course::where('execution','EE-certified Teacher')->orderBy('ministry_id')->get(),
            'teachers' => $teachers,
            'listTeachers' => Role::find(6)->users()->orderBy('name')->SimplePaginate( $perPage = 10, $columns = ['*'], $pageName = "ListTeachers" )
        ]);
    }
}
