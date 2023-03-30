<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Select extends Component
{
    public $iname;
    public $ilabel;
    public $icolspan;
    public $irequired;
    public $disabled;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($iname, $ilabel, $icolspan = '1', $irequired = false, $disabled = false)
    {
        $this->iname = $iname;
        $this->ilabel = $ilabel;
        $this->icolspan = $icolspan;
        $this->irequired = $irequired;
        $this->disabled = $disabled;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.select');
    }
}
