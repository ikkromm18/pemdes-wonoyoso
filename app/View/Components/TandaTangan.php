<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Carbon\Carbon;

class TandaTangan extends Component
{
    /**
     * Create a new component instance.
     */

    public $tanggalIndonesia;
    public $kepalaDesa;
    public function __construct($kepalaDesa)
    {
        Carbon::setLocale('id');
        $this->tanggalIndonesia = Carbon::now()->translatedFormat('d F Y');
        $this->kepalaDesa = $kepalaDesa;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.tanda-tangan');
    }
}
