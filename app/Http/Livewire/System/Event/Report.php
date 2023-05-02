<?php

namespace App\Http\Livewire\System\Event;

use App\Models\Role;
use App\Models\Training;
use App\Models\User;
use Livewire\Component;

class Report extends Component
{
    public $year;
    public $status = 2;
    public $trainings;

    public function mount($year){
        $this->year = $year;
        if($this->year != 'all'){
            $this->trainings = Training::whereYear('date',$year)->get();
        }else {
            $this->trainings = Training::all();
        }
    }

    public function mode_list($value){
        session(['modeList'=> $value]);
    }

    public function list_actual($status){ $this->status = $status; }

    public function render()
    {
        // if($this->year != 'all'){
        //     // Lista usuários que tem algum treinamento cadastrado para eles como professores
        //     $teachers = User::whereIn('id', function ($query) {
        //         $query->select('user_id')->from('trainings')->whereYear('date', $this->year)->groupBy('user_id')->havingRaw('COUNT(*) > 0');
        //     })
        //     // Lista usuários que estão vinculados como professores
        //     ->whereIn('id', function ($query) {
        //         $query->select('user_id')->from('role_user')->whereIn('role_id', function ($query) {
        //             $query->select('id')->from('roles')->where('id', 6);
        //         });
        //     })
        //     ->orderBy('name')->get();
        // }else{

        //     // Lista usuários que tem algum treinamento cadastrado para eles como professores
        //     $teachers = User::whereIn('id', function ($query) {
        //         $query->select('user_id')->from('trainings')->groupBy('user_id')->havingRaw('COUNT(*) > 0');
        //     })
        //     // Lista usuários que estão vinculados como professores
        //     ->whereIn('id', function ($query) {
        //         $query->select('user_id')->from('role_user')->whereIn('role_id', function ($query) {
        //             $query->select('id')->from('roles')->where('id', 6);
        //         });
        //     })
        //     ->orderBy('name')->get();

        // }


        // if($this->year == 'all'){
        //     $trainings_ = Training::where('status',$this->status)->orderBy('date', $this->status == 3 ? 'desc' : 'asc')->paginate(6);
        // }else{
        //     $trainings_ = Training::where('status',$this->status)->whereYear('date',$this->year)->orderBy('date', $this->status == 3 ? 'desc' : 'asc')->paginate(6);
        // }

        return view('livewire.system.event.report',[
            // 'teachers' => $teachers,
            // 'trainings_' => $trainings_,
            'listTeachers' => Role::find(6)->users()->orderBy('name')->SimplePaginate( $perPage = 4, $columns = ['*'], $pageName = "ListTeachers" )
        ]);
    }
}
