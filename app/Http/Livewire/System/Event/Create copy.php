<?php

namespace App\Http\Livewire\System\Event;

use App\Models\Church;
use App\Models\Course;
use App\Models\Schedule;
use App\Models\ScheduleDefault;
use App\Models\Training;
use App\Models\Zone;
use Livewire\Component;
use Livewire\WithPagination;

class Create extends Component
{
    use WithPagination;

    public $user;
    public $course;
    public $teacher;
    public $lesonplan;
    public $date;
    public $url;
    public $phone;
    public $email;
    public $zipcode;
    public $street;
    public $number;
    public $complement;
    public $neighborhood;
    public $city;
    public $status;
    public $kits;
    public $price;
    public $price_church;
    public $discount;
    public $zone_id;
    public $comment;
    public $available;

    public $church_id;
    public $church_pastor;
    public $church_neighborhood;
    public $church_city;
    public $church_zone;

    public $church;
    public $btn_select_church;
    public $church_name;

    public $teachers;
    public $courses;
    public $lesonplans;
    public $zones;
    public $search_church;
    public $schedule;

    public $new_church_role;
    public $new_church_name;
    public $new_church_pastor;
    public $new_church_contact;
    public $new_church_phone;
    public $new_church_email;
    public $new_church_contact_phone;
    public $new_church_contact_email;
    public $new_church_street;
    public $new_church_number;
    public $new_church_complement;
    public $new_church_neighborhood;
    public $new_church_city;
    public $new_church_zone;
    public $new_church_zipcode;
    public $new_church_comment;

    public function mount(){
        $this->user = Auth()->user();
    }

    public function daysTraining()
    { $this->schedule = ScheduleDefault::where('available_id',$this->available)->get(); }

    protected $rules = [
        'course'   => 'required',
        'teacher'  => 'required',
        'available'=> 'required',
        'church'   => 'required',
        'date'     => 'required',
    ];

    public function create()
    {
        $training = Training::create([
            'course_id'         => $this->course,
            'user_id'           => $this->teacher,
            'available_id'      => $this->available,
            'church_id'         => $this->church,
            'url'               => $this->url,
            'date'              => $this->date,
            'comment'           => $this->comment,
            'street'            => $this->street,
            'number'            => $this->number,
            'complement'        => $this->complement,
            'neighborhood'      => $this->neighborhood,
            'city'              => $this->city,
            'zone_id'           => $this->zone_id,
            'schedules'         => $this->schedule,
            'status'            => $this->status,
            'kits'              => $this->kits,
            'price'             => str_replace(',','.', $this->price),
            'price_church'      => str_replace(',','.', $this->price_church),
            'discount'          => str_replace(',','.', $this->discount),
            'zipcode'           => rem_char($this->zipcode),
            'phone'             => rem_char($this->phone),
            'email'             => $this->email,
        ]);

        foreach ($this->schedule as $sch) {
            Schedule::create([
                'training_id' => $training->id,
                'unity_id' => $sch->unity_id,
                'date' => date('Y-m-d',strtotime(' +'.$sch->day.' days -1 day',strtotime($this->date))),
                'start' => $sch->start,
                'end' => $sch->end,
            ]);
        }

        $this->redirectRoute('system.event.view',$training->id);
    }

    public function resetPagination() { $this->resetPage(); }

    // INICIO - BOTÃO PARA ESCOLHER IGREJA
    public $modalChurch = false;
    public function showModalChurch() { $this->modalChurch = true; }
    public function hiddenodalChurch() { $this->modalChurch = false; }
    public function newChurch() { $this->church = $this->new_church; $this->modalChurch = false; }

    public $modalSelectChurch = false;
    public function showModalSelectChurch() { $this->resetPage(); $this->modalSelectChurch = true; }
    public function hiddenModalSelectChurch() { $this->modalSelectChurch = false; }
    public function selectChurch($id)
    {
        $this->church = $id;
        $this->btn_select_church = Church::find($id);
        $this->search_church = null;
        $this->church_name = $this->btn_select_church->name;
        $this->church_pastor = $this->btn_select_church->pastor;
        $this->church_neighborhood = $this->btn_select_church->neighborhood;
        $this->church_city = $this->btn_select_church->city;
        $this->church_zone = ($this->btn_select_church->zone_id != null)?$this->btn_select_church->zone->initial:'';

        if(isset($this->btn_select_church->phone)) {
            $this->phone = $this->btn_select_church->phone;
        } else {
            $this->phone = $this->btn_select_church->contact_phone;
        }

        if(isset($this->btn_select_church->email)) {
            $this->email = $this->btn_select_church->email;
        } else {
            $this->email = $this->btn_select_church->contact_email;
        }

        $this->email         = $this->btn_select_church->email;
        $this->street        = $this->btn_select_church->street;
        $this->number        = $this->btn_select_church->number;
        $this->complement    = $this->btn_select_church->complement;
        $this->neighborhood  = $this->btn_select_church->neighborhood;
        $this->city          = $this->btn_select_church->city;
        $this->zone_id       = $this->btn_select_church->zone_id;
        $this->zipcode       = $this->btn_select_church->zipcode;

        $this->modalSelectChurch = false;
        $this->resetPage();
    }

    public $modalNewChurch = false;
    public function showModalNewChurch () { $this->modalSelectChurch = false; $this->modalNewChurch = true; }
    public function hiddenModalNewChurch () { $this->modalNewChurch = false; }
    public function addNewChurch()
    {
        $church = Church::create([
            "role"          => $this->new_church_role,
            "name"          => $this->new_church_name,
            "pastor"        => $this->new_church_pastor,
            "contact"       => $this->new_church_contact,
            "phone"         => rem_char($this->new_church_phone),
            "email"         => $this->new_church_email,
            "contact_phone" => $this->new_church_contact_phone,
            "contact_email" => $this->new_church_contact_email,
            "street"        => $this->new_church_street,
            "number"        => $this->new_church_number,
            "complement"    => $this->new_church_complement,
            "neighborhood"  => $this->new_church_neighborhood,
            "city"          => $this->new_church_city,
            "zone_id"       => $this->new_church_zone,
            "zipcode"       => rem_char($this->new_church_zipcode),
            "comment"       => $this->new_church_comment,
        ]);

        $this->church = $church->id;
        $this->btn_select_church = $church;
        $this->search_church = null;
        $this->church_name = $this->btn_select_church->name;
        $this->church_pastor = $this->btn_select_church->pastor;
        $this->church_neighborhood = $this->btn_select_church->neighborhood;
        $this->church_city = $this->btn_select_church->city;
        $this->church_zone = ($this->btn_select_church->zone_id != null)?$this->btn_select_church->zone->initial:'';

        if(isset($this->btn_select_church->phone)) {
            $this->phone = $church->phone;
        } else {
            $this->phone = $church->contact_phone;
        }

        if(isset($this->btn_select_church->email)) {
            $this->email = $this->btn_select_church->email;
        } else {
            $this->email = $this->btn_select_church->contact_email;
        }
        $this->street        = $church->street;
        $this->number        = $church->number;
        $this->complement    = $church->complement;
        $this->neighborhood  = $church->neighborhood;
        $this->city          = $church->city;
        $this->zone_id       = $church->zone;
        $this->zipcode       = $church->zipcode;

        if(session('login-role') == '1') { $church->fws()->attach($this->user->id); }
        $this->modalNewChurch = false;
    }
    // FIM - BOTÃO PARA ESCOLHER IGREJA

    public function render()
    {
        $this->lesonplans = (isset(Course::find($this->course)->available))?Course::find($this->course)->available()->orderBy('name')->get(): [];
        $this->zones = Zone::orderBy('name')->get();

        if (session('login-role') == '1') {
            $this->teachers = (isset(Course::find($this->course)->teachers))?Course::find($this->course)->teachers()->orderBy('name')->get(): [];
            $this->courses  = Course::where('execution','EE-certified Teacher')->orderBy('name')->get();
        }else{
            $this->courses   = $this->user->courses()->where('execution','EE-certified Teacher')->orderBy('name')->get();
            $this->teachers  = (isset(Course::find($this->course)->teachers))?Course::find($this->course)->teachers()->where('user_id',$this->user->id)->orderBy('name')->get(): [];
        }

        return view('livewire.system.event.create',[ 'churches' => Church::query()->when($this->search_church, fn($q) => $q->where('name','like','%'.$this->search_church.'%'))->orderBy('name')->paginate(5) ]);
    }

}
