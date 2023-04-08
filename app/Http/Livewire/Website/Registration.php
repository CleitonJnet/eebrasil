<?php

namespace App\Http\Livewire\Website;

use App\Models\Church;
use App\Models\Training;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Registration extends Component
{
    use WithPagination;

    public $event;
    public $user;
    public $step = 1;
    public $ver_email;
    public $search_church;
    public $church_selected;

    public $name;
    public $email;
    public $phone;
    public $birth;
    public $gender;
    public $ministery;
    public $is_pastor;

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

    protected $rules = [ 'email' => 'required|email|unique:users' ];

    public function mount(Training $event){ $this->event = $event; }

    public function defineStep($v){ $this->step = $v; }

    public function verify_email(){

        $this->user = User::where('email',$this->email)->get()->first();
        if($this->user != null) { $this->ver_email = true; }else{ $this->ver_email = false; }
    }

    public function search_zipcode_church(){

        $data = search_zipcode($this->church_zipcode);

        $this->church_street       = $data['street'];
        $this->church_neighborhood = $data['neighborhood'];
        $this->church_city         = $data['city'];
        $this->church_zone         = $data['zone'];
    }

    public function resetPagination() { $this->resetPage(); }

    public function selectChurch($id){
        $this->church_selected = Church::find($id);
    }

    public function render()
    {
        return view('livewire.website.registration',[
            'churches' => Church::query()->when($this->search_church, fn($q) => $q->where('name','like','%'.$this->search_church.'%'))->orderBy('name')->paginate($perPage = 5, $columns = ['*'], $pageName = "church"),
        ]);

    }
}
