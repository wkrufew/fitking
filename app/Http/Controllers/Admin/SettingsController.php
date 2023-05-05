<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Ver Dashboard')->only('index');
    }

    public function index()
    {
        $setting = Setting::first();
        //dd($setting);
        return view('admin.settings.index', compact('setting'));
    }

    public function edit(Setting $setting)
    {
        return view('admin.settings.edit', compact('setting'));
    }
    public function update(Request $request, Setting $setting)
    {
        $setting->update($request->all());
        Cache::forget('settings');
        
        return redirect()->route('admin.settings.index')->with('mensaje','ok');
    }
}
