<?php

namespace App\View\Components;

use Illuminate\View\Component;
use phpDocumentor\Reflection\Types\This;

class header extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     * 
     * 
     */
    public $title;
    public $script;
    public function __construct($title,$script="")
    {
        $this->title=$title;
        $this->script=$script;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.header');
    }
}
