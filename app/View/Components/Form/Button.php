<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Button extends Component
{
    public $iname;
    public $ilabel;
    public $icolspan;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($iname, $ilabel, $icolspan = '1')
    {
        $this->iname = $iname;
        $this->ilabel = $ilabel;
        $this->icolspan = $icolspan;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.button');
    }
}
