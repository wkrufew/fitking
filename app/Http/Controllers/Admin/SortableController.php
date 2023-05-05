<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class SortableController extends Controller
{
    public function slider(Request $request)
    {
        $orden = 1;
        $sorts = $request->get('sorts');

        foreach ($sorts as $sort) {
            $slider = Slider::find($sort);
            $slider->orden = $orden;
            $slider->save();
            $orden++;
        }

        Cache::forget('welcome');
    }
}
