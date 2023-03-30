<?php

namespace App\View\Components\Event\List;

use App\Models\Training;
use Illuminate\View\Component;

class Item extends Component
{
    public $course;
    public $events_done;
    public $events_confirmed;
    public $events_plan;
    public $events_canceled;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($course, $teacher, $year){

        // dd($year);
        $this->course = $course;
        if ($year != 'all') {
            $this->events_done      = Training::where('course_id',$course->id)->where('user_id',$teacher)->whereYear('date',$year)->where('status',3)->orderBy('date', 'DESC')->paginate( $perPage = 3, $columns = ['*'], $pageName = "ev_3$teacher$course->id" );
            $this->events_confirmed = Training::where('course_id',$course->id)->where('user_id',$teacher)->whereYear('date',$year)->where('status',2)->orderBy('date')->paginate( $perPage = 3, $columns = ['*'], $pageName = "ev_2$teacher$course->id" );
            $this->events_plan      = Training::where('course_id',$course->id)->where('user_id',$teacher)->whereYear('date',$year)->where('status',1)->orderBy('date')->paginate( $perPage = 3, $columns = ['*'], $pageName = "ev_1$teacher$course->id" );
            $this->events_canceled  = Training::where('course_id',$course->id)->where('user_id',$teacher)->whereYear('date',$year)->where('status',0)->orderBy('date')->paginate( $perPage = 3, $columns = ['*'], $pageName = "ev_0$teacher$course->id" );
        }else{
            $this->events_done      = Training::where('course_id',$course->id)->where('user_id',$teacher)->where('status',3)->orderBy('date', 'DESC')->paginate( $perPage = 3, $columns = ['*'], $pageName = "ev_3$teacher$course->id" );
            $this->events_confirmed = Training::where('course_id',$course->id)->where('user_id',$teacher)->where('status',2)->orderBy('date')->paginate( $perPage = 3, $columns = ['*'], $pageName = "ev_2$teacher$course->id" );
            $this->events_plan      = Training::where('course_id',$course->id)->where('user_id',$teacher)->where('status',1)->orderBy('date')->paginate( $perPage = 3, $columns = ['*'], $pageName = "ev_1$teacher$course->id" );
            $this->events_canceled  = Training::where('course_id',$course->id)->where('user_id',$teacher)->where('status',0)->orderBy('date')->paginate( $perPage = 3, $columns = ['*'], $pageName = "ev_0$teacher$course->id" );
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.event.list.item');
    }
}
