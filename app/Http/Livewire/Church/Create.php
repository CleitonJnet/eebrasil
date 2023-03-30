<?php

namespace App\Http\Livewire\Church;

use Livewire\Component;

class Create extends Component
{
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

    public function render()
    {
        return view('livewire.church.create');
    }
}
