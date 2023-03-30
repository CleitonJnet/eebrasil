<?php

namespace App\Http\Livewire\System\Student;

use App\Models\Training;
use App\Models\User;
use App\Models\Zone;
use Livewire\Component;

class Create extends Component
{
    public $event;
    public $name;
    public $email;
    public $birth;
    public $gender;
    public $phone;
    public $church;
    public $ministery;
    public $pastor;
    public $zipcode;
    public $street;
    public $number;
    public $complement;
    public $neighborhood;
    public $city;
    public $zone_id;
    public $comment;

    public function mount(Training $event){
        $this->event = $event;
    }

    public function create(){
        User::create([
            'name'         => $this->name,
            'email'        => $this->email,
            'birth'        => $this->birth,
            'gender'       => $this->gender,
            'phone'        => $this->phone,
            'church'       => $this->church,
            'ministery'    => $this->ministery,
        ]);

        $this->redirect(route('system.student.index',$this->event->id));
    }

    public function render()
    {
        return view('livewire.system.student.create',[
            'zones' => Zone::all()
        ]);
    }
}
