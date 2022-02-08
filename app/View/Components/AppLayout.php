<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppLayout extends Component
{
    public $title = '';
    public $bodyClass = '';
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function __construct($bodyClass = '', $title = '')
    {
        $this->title = $title;
        $this->bodyClass = $bodyClass;
    }

    public function render()
    {
        return view('layouts.app');
    }
}
