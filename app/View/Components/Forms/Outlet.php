<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Outlet extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $legal;
    public $val;
    public $idx;
    public function __construct($legal = 0, $val = false, $idx = 0)
    {
        $this->legal = $legal;
        $this->val = $val;
        $this->idx = $idx;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.outlet');
    }
}
