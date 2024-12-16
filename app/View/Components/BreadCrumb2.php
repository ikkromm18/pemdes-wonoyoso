<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BreadCrumb2 extends Component
{
    /**
     * Create a new component instance.
     */

    public $title;
    public $dashboard;
    public $pagename;
    public $subpagename;

    public function __construct($title, $dashboard, $pagename, $subpagename)
    {

        $this->title = $title;
        $this->dashboard = $dashboard;
        $this->pagename = $pagename;
        $this->subpagename = $subpagename;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.bread-crumb2');
    }
}
