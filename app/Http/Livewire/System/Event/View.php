<?php

namespace App\Http\Livewire\System\Event;

use App\Models\Church;
use Livewire\Component;
use App\Models\Training;
use Illuminate\Support\Facades\DB;

class View extends Component
{
    public $event;
    public $days;
    public $hours;
    public $tot_hours;
    public $tot;
    public $minutes = [];
    public $totNewChurches;
    public $result_hours;
    public $totStudents;
    public $totPastors;
    public $totChurches;
    public $tot_payment;
    public $totAccredited;
    public $tot_kits_received;

    public function mount(Training $event){
        $this->event = $event;
    }

    public function render()
    {
        $this->tot = Church::whereRaw('DATEDIFF(current_date,created_at) <= 730')->select('id')->get('id');

        foreach ($this->tot as $ch) { $churchID[] = $ch->id; }

        $this->totNewChurches = DB::table('users')
                                    ->join('training_user','users.id','=','training_user.user_id')
                                    ->join('churches','churches.id','=','users.church_id')
                                    ->where('training_user.training_id',$this->event->id)
                                    ->whereIn('churches.id',$churchID)->distinct()
                                    ->select('churches.id','churches.name','churches.created_at')
                                    ->count('churches.id');


        $this->days = DB::table('schedules')
        ->where('training_id',$this->event->id)
        ->select('date')
        ->distinct()
        ->get();

        $this->totStudents = $this->event->students()->count();
        $this->totPastors  = $this->event->students()->where('pastor',1)->count();
        $this->totAccredited  = $this->event->students()->where('accredited',1)->count();
        $this->totChurches = $this->event->students()->distinct()->count('church_id');
        $this->tot_payment = DB::table('training_user')->where('training_id',$this->event->id)->where('payment',1)->count();
        $this->tot_kits_received = DB::table('training_user')->where('training_id',$this->event->id)->where('kit',1)->count();

        return view('livewire.system.event.view');
    }

}
