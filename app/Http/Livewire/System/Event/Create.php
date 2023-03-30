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

    public $event;
    public $teachers;
    public $courses;
    public $lesonplans;
    public $zones;
    public $search_church;
    public $schedule;
    public $church_selected;

    // ATRIBUTOS DO EVENTO:
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
    public $zone;
    public $comment;

    // ATRIBUTOS DA IGREJA:
    public $church_name;
    public $church_pastor;
    public $church_phone;
    public $church_email;
    public $church_leader;
    public $church_leader_phone;
    public $church_leader_email;
    public $church_street;
    public $church_number;
    public $church_complement;
    public $church_neighborhood;
    public $church_city;
    public $church_zone;
    public $church_zipcode;
    public $church_comment;

    public function mount(){ $this->user = Auth()->user(); }

    public function daysTraining() { $this->schedule = ScheduleDefault::where('available_id',$this->lesonplan)->get(); }

    public function create()
    {
        $this->event = Training::create([
            'course_id'         => $this->course,
            'user_id'           => $this->teacher,
            'available_id'      => $this->lesonplan,
            'church_id'         => $this->church_selected->id,
            'url'               => $this->url,
            'date'              => $this->date,
            'comment'           => $this->comment,
            'street'            => $this->street,
            'number'            => $this->number,
            'complement'        => $this->complement,
            'neighborhood'      => $this->neighborhood,
            'city'              => $this->city,
            'zone_id'           => $this->zone,
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

        $this->redirectRoute('system.event.view',$this->event->id);
    }

    public function resetPagination() { $this->resetPage(); }

    // INICIO - BOTÃO PARA ESCOLHER IGREJA
    public $modalChurch = false;
    public function showModalChurch() { $this->modalChurch = true; }
    public function hiddenodalChurch() { $this->modalChurch = false; }
    public function newChurch() { $this->church_selected = $this->new_church; $this->modalChurch = false; }

    public $modalSelectChurch = false;
    public function showModalSelectChurch() { $this->resetPage(); $this->modalSelectChurch = true; }
    public function hiddenModalSelectChurch() { $this->modalSelectChurch = false; }
    public function selectChurch($id)
    {
        $this->church_selected  = Church::find($id);
        $this->street       = $this->church_selected->street;
        $this->number       = $this->church_selected->number;
        $this->complement   = $this->church_selected->complement;
        $this->neighborhood = $this->church_selected->neighborhood;
        $this->city         = $this->church_selected->city;
        $this->zone         = $this->church_selected->zone_id;
        $this->zipcode      = $this->church_selected->zipcode;
        $this->modalSelectChurch = false;
        $this->resetPage();
    }

    public $modalNewChurch = false;
    public function showModalNewChurch () { $this->modalSelectChurch = false; $this->modalNewChurch = true; }
    public function hiddenModalNewChurch () { $this->modalNewChurch = false; }
    public function addNewChurch()
    {
        $church = Church::create([
            "name"          => $this->church_name,
            "pastor"        => $this->church_pastor,
            "phone"         => rem_char($this->church_phone),
            "email"         => $this->church_email,
            "contact"       => $this->church_leader,
            "contact_phone" => $this->church_leader_phone,
            "contact_email" => $this->church_leader_email,
            "street"        => $this->church_street,
            "number"        => $this->church_number,
            "complement"    => $this->church_complement,
            "neighborhood"  => $this->church_neighborhood,
            "city"          => $this->church_city,
            "zone_id"       => $this->church_zone,
            "zipcode"       => rem_char($this->church_zipcode),
            "comment"       => $this->church_comment,
        ]);

        $this->church_selected  = $church;
        $this->street       = $this->church_selected->street;
        $this->number       = $this->church_selected->number;
        $this->complement   = $this->church_selected->complement;
        $this->neighborhood = $this->church_selected->neighborhood;
        $this->city         = $this->church_selected->city;
        $this->zipcode      = $this->church_selected->zipcode;
        $this->zone         = $this->church_selected->zone_id;

        if(session('login-role') == '1') { $church->fws()->attach($this->user->id); }
        $this->modalNewChurch = false;
    }
    // FIM - BOTÃO PARA ESCOLHER IGREJA

    public function search_zipcode_event(){

        $data = search_zipcode($this->zipcode);

        $this->street       = $data['street'];
        $this->neighborhood = $data['neighborhood'];
        $this->city         = $data['city'];
        $this->zone         = $data['zone'];
    }

    public function search_zipcode_church(){

        $data = search_zipcode($this->church_zipcode);

        $this->church_street       = $data['street'];
        $this->church_neighborhood = $data['neighborhood'];
        $this->church_city         = $data['city'];
        $this->church_zone         = $data['zone'];
    }

    public function render()
    {
        $this->lesonplans = (isset(Course::find($this->course)->available))?Course::find($this->course)->available()->orderBy('name')->get(): [];
        $this->zones = Zone::orderBy('name')->get();

        if (session('login-role') == '6') {
            $this->courses   = $this->user->courses()->where('execution','EE-certified Teacher')->orderBy('name')->get();
            $this->teachers  = (isset(Course::find($this->course)->teachers))?Course::find($this->course)->teachers()->where('user_id',$this->user->id)->orderBy('name')->get(): [];
        }else{
            $this->teachers = (isset(Course::find($this->course)->teachers))?Course::find($this->course)->teachers()->orderBy('name')->get(): [];
            $this->courses  = Course::where('execution','EE-certified Teacher')->orderBy('name')->get();
        }

        return view('livewire.system.event.create',[ 'churches' => Church::query()->when($this->search_church, fn($q) => $q->where('name','like','%'.$this->search_church.'%'))->orderBy('name')->paginate(5) ]);
    }

}
