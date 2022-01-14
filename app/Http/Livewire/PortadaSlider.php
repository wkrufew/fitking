<?php

namespace App\Http\Livewire;

use App\Models\Slider;
use Livewire\Component;

class PortadaSlider extends Component
{
    //public $sliders;
    public $sliders = [];

    public function loadSlider()
    {
        $this->sliders = Slider::all();

        $this->emit('swiper');

        //sleep(2000);
    }
    public function render()
    {
        //$this->sliders = Slider::all();
        return view('livewire.portada-slider');
    }
}
