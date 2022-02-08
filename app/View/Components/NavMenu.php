<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NavMenu extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $visibleLogo = true;
    public $visible = true;
    public function __construct($visibleLogo = true, $visible=true)
    {
        $this->visibleLogo = $visibleLogo;
        $this->visible = $visible;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.nav-menu');
    }
}
