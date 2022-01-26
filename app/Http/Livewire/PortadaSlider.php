<?php

namespace App\Http\Livewire;

use App\Models\Slider;
use Livewire\Component;

class PortadaSlider extends Component
{
    public $sliders = [];
 
    public function loadSlider()
    {
        //$this->sliders = Slider::orderBy('orden','asc')->get();
        //$this->sliders= 
        $this->sliders = cache()->remember('welcome', 60*60*24, function () {
            return Slider::orderBy('orden','asc')->get(); //DB::table('sliders')->select('orden','imagen')->orderBy('orden','asc')->get();
        });

        $this->emit('swiper');
    }
    public function render()
    {        
        return view('livewire.portada-slider');
    }
}
