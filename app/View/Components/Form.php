<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Form extends Component
{
    public $label_submit;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label_submit = 'Salvar')
    {
        $this->label_submit = $label_submit;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form');
    }
}
