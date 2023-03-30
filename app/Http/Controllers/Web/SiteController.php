<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\Training;
use Illuminate\Support\Facades\DB;

// use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home(){
        $t_ids = DB::table('media')->select('training_id')->distinct()->get()->pluck('training_id');

        $last_training = Training::where('date','<',now())->orderBy('date','ASC')->whereIn('id',$t_ids)->get()->last();
        $trainings = Training::where('date','<',now())->orderBy('date','DESC')->whereIn('id',$t_ids)->limit(5)->get();

        $trainings_news = Training::where('date','>=',now())->orderBy('date','ASC')->limit(3)->get();

        return view('website.home',compact('last_training','trainings','trainings_news'));
    }

    public function gallery(){
        $t_ids = DB::table('media')->select('training_id')->distinct()->get()->pluck('training_id');
        $trainings = Training::where('date','<',now())->where('status',3)->orderBy('date','DESC')->whereIn('id',$t_ids)->get();

        return view('website.gallery', compact('trainings'));
    }
    public function photos($id){
        $photos = Training::find($id)->media;

        return view('website.photos', compact('photos'));
    }
    public function ministeries(){
        return view('website.ministeries');
    }
    public function events(){
        $trainings_past = Training::where('date','<',now())->orderBy('date','DESC')->limit(3)->get();
        $trainings = Training::where('date','>=',date('Y-m-d'))->where('status',2)->orderBy('date')->get();

        return view('website.events', compact('trainings','trainings_past'));
    }
    public function event($id){
        $training = Training::find($id);
        $time = $training->schedules()->pluck('start')->first();

        if($time == null){ $time = "19:00:00"; }

        // CARGA HORÁRIA
        $totalDuration = $training->schedules()
        ->select(DB::raw('SUM(TIMESTAMPDIFF(MINUTE, start, end)) as total_minutes'))
        ->first()->total_minutes;

        $hours = floor($totalDuration / 60);
        $minutes = $totalDuration % 60;

        if($hours<10) { $hours = '0'.$hours; }
        if($minutes<10) { $minutes = '0'.$minutes; }

        $workload = "$hours:$minutes"; // Resultado final em formato hora:minuto

        $days = DB::table('schedules')
        ->where('training_id',$training->id)
        ->select('date')
        ->distinct()
        ->get();

        return view('website.event',compact('training','time','workload','days'));
    }
    public function clinic(){
        return view('website.ministery-clinic');
    }
    public function eed(){
        return view('website.ministery-eed');
    }
    public function shareyourfaith(){
        return view('website.ministery-share-your-faith');
    }
    public function kidsee(){
        return view('website.ministery-kidsee');
    }
    public function hopeforkids(){
        return view('website.ministery-hopeforkids');
    }
}
