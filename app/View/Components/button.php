<?php

namespace App\View\Components;

use Illuminate\View\Component;

class button extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $link;
    public $icon;
    public $text;
    public $onclick;
    public function __construct(Array $button)
    {
        $this->link=$button["link"];
        $this->icon=$button["icon"];
        $this->text=$button["text"];
        $this->onclick=$button["onclick"];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.button');
    }
}
