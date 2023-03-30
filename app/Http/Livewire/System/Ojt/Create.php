<?php

namespace App\Http\Livewire\System\Ojt;

use App\Models\Church;
use App\Models\Ojt;
use App\Models\Training;
use App\Models\Zone;
use Livewire\Component;
use Livewire\WithPagination;

class Create extends Component
{
    use WithPagination;

    public $event;
    public $training_id;
    public $church_id;
    public $mentor_id;
    public $zone_id;
    public $prospect;
    public $position;
    public $type;
    public $indicated;
    public $date;
    public $time;
    public $gender;
    public $email;
    public $phone;
    public $street;
    public $number;
    public $complement;
    public $neighborhood;
    public $city;
    public $zipcode;
    public $comment;

    public $btn_select_church;
    public $search_church;
    public $church_name;
    public $church_pastor;
    public $church_neighborhood;
    public $church_city;
    public $church_zone;

    public function mount(Training $event){
        $this->event = $event;
    }

    public $modalSelectChurch = false;
    public function showModalSelectChurch() { $this->resetPage(); $this->modalSelectChurch = true; }
    public function hiddenModalSelectChurch() { $this->modalSelectChurch = false; }
    public function selectChurch($id)
    {
        $this->btn_select_church = Church::find($id);
        $this->search_church = null;
        $this->church_name = $this->btn_select_church->name;
        $this->church_pastor = $this->btn_select_church->pastor;
        $this->church_neighborhood = $this->btn_select_church->neighborhood;
        $this->church_city = $this->btn_select_church->city;
        $this->church_zone = ($this->btn_select_church->zone_id != null)?$this->btn_select_church->zone->initial:'';

        $this->modalSelectChurch = false;
        $this->resetPage();
    }



    public function create(){

        Ojt::create([
            'training_id' => $this->event->id,
            'church_id'   => $this->btn_select_church,
            'mentor_id'   => $this->mentor_id,
            'zone_id'     => $this->zone_id,
            'prospect'    => $this->prospect,
            'position'    => $this->position,
            'type'        => $this->type,
            'indicated'   => $this->indicated,
            'date'        => $this->date,
            'time'        => $this->time,
            'gender'      => $this->gender,
            'email'       => $this->email,
            'phone'       => $this->phone,
            'street'      => $this->street,
            'number'      => $this->number,
            'complement'  => $this->complement,
            'neighborhood'=> $this->neighborhood,
            'city'        => $this->city,
            'zipcode'     => $this->zipcode,
            'comment'     => $this->comment,
        ]);

        $this->event->id = $this->btn_select_church = $this->mentor_id = $this->zone_id = $this->prospect = $this->position = $this->type = $this->indicated = $this->date = $this->time = $this->gender = $this->email = $this->phone = $this->street = $this->number = $this->complement = $this->neighborhood = $this->city = $this->zipcode = $this->comment = null;
        session()->flash('message', 'Visita cadastrada.');
    }

    public function render()
    {
        return view('livewire.system.ojt.create',[
            'zones' => Zone::orderBy('initial')->get(),
            'churches' => Church::query()->when($this->search_church, fn($q) => $q->where('name','like','%'.$this->search_church.'%'))->orderBy('name')->paginate(5)
        ]);
    }
}
