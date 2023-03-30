<?php

namespace App\Http\Livewire\System\Schedule;

use App\Models\Schedule;
use App\Models\ScheduleDefault;
use App\Models\Training;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{
    public $event;
    public $minutes;
    public $schedule;
    public $workload;
    public $days;

    public function mount(Training $event){
        $this->event = $event;
    }

    public function resetPlan(){
        $this->deletePlan();
        $this->schedule = ScheduleDefault::where('available_id',$this->event->available_id)->get();

        foreach ($this->schedule as $sch) {
            Schedule::create([
                'training_id' => $this->event->id,
                'unity_id' => $sch->unity_id,
                'date' => date('Y-m-d',strtotime(' +'.$sch->day.' days -1 day',strtotime($this->event->date))),
                'start' => $sch->start,
                'end' => $sch->end,
            ]);
        }
        $this->redirect(route('system.schedule.index',$this->event->id));
    }

    public function deletePlan()
    {
        $schedule = $this->event->schedules;
        if($schedule->count()>0){
            foreach ($schedule as $value) {
                 $value->delete();
            }
        }

        $this->redirect(route('system.schedule.index',$this->event->id));
    }

    public function render()
    {
        $this->workload = workload_lot($this->minutes);

        $this->days = DB::table('schedules')
        ->where('training_id',$this->event->id)
        ->select('date')
        ->distinct()
        ->get();

        return view('livewire.system.schedule.index');
    }
}
