<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class LegalAspect extends Component
{
    public $legal;
    public $val;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($legal = 0, $val = false)
    {
        $this->legal = $legal;
        $this->val = $val;
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.legal-aspect');
    }
}