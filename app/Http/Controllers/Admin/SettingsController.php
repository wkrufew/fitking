<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Ver Dashboard')->only('index');
    }

    public function index()
    {
        $configuraciones = Setting::all();
        //dd($configuraciones);
        return view('admin.settings.index', compact('configuraciones'));
    }

    public function edit(Setting $setting)
    {
         return view('admin.settings.edit', compact('setting'));
    }
    public function update(Request $request, Setting $setting)
    {
        $setting->update($request->all());
        
        return redirect()->route('admin.settings.index')->with('mensaje','ok');
    }
}
