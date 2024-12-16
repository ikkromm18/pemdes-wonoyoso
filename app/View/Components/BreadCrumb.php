<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class breadcrumb extends Component
{
    /**
     * Create a new component instance.
     */

    public $title;
    public $dashboard;
    public $pagename;


    public function __construct($title, $dashboard, $pagename)
    {

        $this->title = $title;
        $this->dashboard = $dashboard;
        $this->pagename = $pagename;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.breadcrumb');
    }
}
