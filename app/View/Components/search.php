<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class search extends Component
{
    /**
     * Create a new component instance.
     */

    public $route;
    public $name;
    public $placeholder;

    public function __construct($route, $name, $placeholder = "Cari Data")
    {
        $this->route = $route;
        $this->name = $name;
        $this->placeholder = $placeholder ?? "Cari Data";
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.search');
    }
}
