<?php

namespace App\Http\Livewire\Website;

use App\Models\Church;
use App\Models\Training;
use App\Models\User;
use App\Models\Zone;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Registration extends Component
{
    use WithPagination;

    public $event;
    public $search_church;

    public $church_selected;
    public $modalCreateStudent;
    public $ver_email;
    public $user;

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

    public function mount(Training $event){
        $this->event = $event;
    }

    public function search_zipcode_church(){

        $data = search_zipcode($this->church_zipcode);

        $this->church_street       = $data['street'];
        $this->church_neighborhood = $data['neighborhood'];
        $this->church_city         = $data['city'];
        $this->church_zone         = $data['zone'];
    }

    public function resetPagination() { $this->resetPage(); }

    public $modalSelectChurch = false;
    public function showModalSelectChurch() { $this->resetPage('church'); $this->search_church = null; $this->modalSelectChurch = true; }
    public function hiddenModalSelectChurch() { $this->church_selected = null; $this->modalSelectChurch = false; }

    public function selectChurch($id){
        $this->church_selected = Church::find($id);
        $this->modalSelectChurch = false;
        $this->modalCreateStudent = true;
    }

    public $modalNewChurch = false;
    public function showModalNewChurch() {  $this->modalSelectChurch = false; $this->modalNewChurch = true; }
    public function hiddenModalNewChurch() { $this->modalNewChurch = false; }
    public function addNewChurch(){
        $this->church_selected = Church::create([
            'name'         => $this->church_name,
            'pastor'       => $this->church_pastor,
            'phone'        => $this->church_phone,
            'email'        => $this->church_email,
            'zipcode'      => $this->church_zipcode,
            'street'       => $this->church_street,
            'number'       => $this->church_number,
            'complement'   => $this->church_complement,
            'neighborhood' => $this->church_neighborhood,
            'city'         => $this->church_city,
            'zone_id'      => $this->church_zone,
        ]);
        $this->modalNewChurch = false;
        $this->modalCreateStudent = true;
    }

    public function verify_email(){
        $this->user = User::where('email',$this->email)->get()->first();
        if($this->user != null)
        { $this->ver_email = true; }else{ $this->ver_email = false; }
    }

    public function select_student($id, $change){
        if ($this->event->students()->where('user_id',$id)->count()==0) {
            DB::table('training_user')->insert(['training_id'=>$this->event->id,'user_id'=>$id]);
            $this->name = $this->email = $this->phone = $this->birth = $this->gender = $this->ministery = null;
            $this->ver_email = false;
            if ($change) {
                $this->user->update(['church_id'=>$this->church_selected->id]);
                session()->flash('message', 'Usuário inscrito neste evento, e igreja atualizada');
            }else{
                session()->flash('message', 'Usuário inscrito neste evento.');
            }
        }else{
            if ($change) {
                $this->user->update(['church_id'=>$this->church_selected->id]);
                session()->flash('message', 'Usuário já encontra-se neste evento, mas a sua igreja foi atualizada');
            }else{
                session()->flash('message', 'Usuário já encontra-se neste evento.');
            }
            $this->name = $this->email = $this->phone = $this->birth = $this->gender = $this->ministery = null;
            $this->ver_email = false;
        }
    }


    public function render()
    {
        return view('livewire.website.registration',[
            'zones' => Zone::orderBy('initial')->get(),
            'churches' => Church::query()->when($this->search_church, fn($q) => $q->where('name','like','%'.$this->search_church.'%'))->orderBy('name')->paginate($perPage = 5, $columns = ['*'], $pageName = "church"),
        ]);

    }
}
