<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels = Level::all();
        return view('admin.levels.index', compact('levels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.levels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'name.required' => 'El campo nombre es requerido',
            'name.unique' => 'El nivel ingresado ya existe',            
        ];
        $rules = [
            'name'=> array('required', 'unique:levels'),
        ];
        
        $this->validate($request, $rules, $messages);

        $level = Level::create($request->all());
        
        $level = $request->name;
        $notificacion="El nivel $level se ha añadido correctamente";

        return redirect()->route('admin.levels.index')->with(compact('notificacion'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Level $level)
    {
        return view('admin.levels.show', compact('level'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Level $level)
    {
        return view('admin.levels.edit', compact('level'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Level $level)
    {
        $messages = [
            'name.required' => 'El campo nombre es requerido'
        ];
        $rules = [
            'name'=> array('required', 'unique:levels,name,'.$level->id),
        ];
        
        $this->validate($request, $rules, $messages);

        $level->update($request->all());

        $level = $request->name;
        $notificacion="El nivel  $level  se ha actualizado correctamente";

        return redirect()->route('admin.levels.index')->with(compact('notificacion'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Level $level)
    {
        $level->delete();

        $lev = $level->name;
        $notificacion="El nivel  $lev  se ha eliminado correctamente";

        return redirect()->route('admin.levels.index')->with(compact('notificacion'));
    }
}
