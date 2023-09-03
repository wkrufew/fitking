<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class ControllerSlider extends Controller
{
    public function index()
    {   
        $sliders = Slider::orderBy('orden', 'asc')->get();

        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function store(Request $request)
    {
        
        $rules = [
            'file'=>array('image', 'required'),
        ];
        
        $this->validate($request, $rules);
        
        
        $slider = new Slider($request->only('file'));

        if($request->file('file'))
        {
             $imagen = Storage::put('sliders', $request->file('file'));

             $slider->imagen =  $imagen;
        }
       
        $slider->save();

        Cache::forget('welcome');

        return redirect()->route('admin.sliders.index')->with('mensaje','ok');
    }

    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit',compact('slider'));
    }

    public function update(Slider $slider, Request $request)
    {

        if($request->file('file'))
        {
            $imagen = Storage::put('sliders', $request->file('file'));

            if ($slider->imagen) {
                Storage::delete($slider->imagen);

                $slider->imagen =  $imagen;
            }else{
                
                $slider->imagen =  $imagen;
            }
        }

        $slider->update($request->only('file'));

        Cache::forget('welcome');

        return redirect()->route('admin.sliders.index');
    }

    public function destroy(Slider $slider)
    {
        Storage::delete($slider->imagen);
        $slider->delete();
        Cache::forget('welcome');
        return redirect()->route('admin.sliders.index');
    }
}
