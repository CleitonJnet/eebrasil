<?php

namespace App\View\Components\Form;

use App\Models\Zone;
use Illuminate\View\Component;

class Address extends Component
{
    // public $zipcode;
    // public $street;
    // public $number;
    // public $complement;
    // public $neighborhood;
    // public $city;
    // public $zone;

    public $address;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($zipcode = null, $street = null, $number = null, $complement = null, $neighborhood = null, $city = null, $zone = null)
    {
        $this->address['zipcode']      = $zipcode;
        $this->address['street']       = $street;
        $this->address['number']       = $number;
        $this->address['complement']   = $complement;
        $this->address['neighborhood'] = $neighborhood;
        $this->address['city']         = $city;
        $this->address['zone']         = $zone;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.address', ['zones' => Zone::orderBy('initial')->get(),'address'=>$this->address ]);
    }
}
