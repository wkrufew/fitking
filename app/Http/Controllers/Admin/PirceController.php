<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Price;
use Illuminate\Http\Request;

class PirceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prices = Price::all();
        return view('admin.prices.index', compact('prices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.prices.create');
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
            'name.unique' => 'El precio ingresado ya existe', 
            'value.required' => 'El valor del precio es requerido',
            'value.numeric' => 'El valor debe ser numerico no caracteres',           
        ];
        $rules = [
            'name'=> array('required', 'unique:prices'),
            'value'=> array('required', 'numeric')
        ];
        
        $this->validate($request, $rules, $messages);

        $price = Price::create($request->all());
        
        $price = $request->name;
        $notificacion="El precio $price se ha añadido correctamente";

        return redirect()->route('admin.prices.index')->with(compact('notificacion'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Price $price)
    {
        return view('admin.prices.show', compact('price'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Price $price)
    {
        return view('admin.prices.edit', compact('price'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Price $price)
    {
        $messages = [
            'name.required' => 'El campo nombre es requerido',
            'value.required' => 'El valor del precio es requerido',
            'value.numeric' => 'El valor debe ser numerico no caracteres',
        ];
        $rules = [
            'name'=> array('required', 'unique:prices,name,'.$price->id),
            'value'=> array('required', 'numeric')
        ];
        
        $this->validate($request, $rules, $messages);

        $price->update($request->all());

        $price = $request->name;
        $notificacion="El precio  $price  se ha actualizado correctamente";

        return redirect()->route('admin.prices.index')->with(compact('notificacion'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Price $price)
    {
        $price->delete();

        $prices = $price->name;
        $notificacion="El precio  $prices  se ha eliminado correctamente";

        return redirect()->route('admin.prices.index')->with(compact('notificacion'));
    }
}
