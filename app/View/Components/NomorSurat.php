<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NomorSurat extends Component
{
    /**
     * Create a new component instance.
     */

    public $id;
    public $jenisSurat;
    public $namaSurat;
    public function __construct($id, $jenisSurat, $namaSurat)
    {
        $this->id = $id;
        $this->jenisSurat = $jenisSurat;
        $this->namaSurat = $namaSurat;
    }

    public static function getRomanMonth($month)
    {
        $romanMonths = [
            1 => 'I',
            2 => 'II',
            3 => 'III',
            4 => 'IV',
            5 => 'V',
            6 => 'VI',
            7 => 'VII',
            8 => 'VIII',
            9 => 'IX',
            10 => 'X',
            11 => 'XI',
            12 => 'XII',
        ];

        return $romanMonths[$month] ?? '';
    }

    public static function getInitials($string)
    {
        $words = explode(' ', $string);
        $initials = '';
        foreach ($words as $word) {
            $initials .= strtoupper(substr($word, 0, 1));
        }
        return $initials;
    }

    public function render()
    {
        return view('components.nomor-surat', [
            'romanMonth' => self::getRomanMonth(date('n')),
            'initials' => self::getInitials($this->jenisSurat),
        ]);
    }
    /**
     * Get the view / contents that represent the component.
     */
    // public function render(): View|Closure|string
    // {
    //     return view('components.nomor-surat');
    // }
}
