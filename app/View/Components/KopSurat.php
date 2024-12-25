<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class KopSurat extends Component
{
    /**
     * Create a new component instance.
     */

    public $alamat;
    public $kodepos;
    public function __construct($alamat = "Wonoyoso Gg. 5 RT 04 / RW 002 Buaran Pekalongan", $kodepos = "51171")
    {
        $this->alamat = $alamat;
        $this->kodepos = $kodepos;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.kop-surat');
    }
}
