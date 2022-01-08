<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categories = Category::where('estado',1)->get();
        
        return view('admin.categorias.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categorias.create');
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
            'name.unique' => 'La categoria ingresada ya existe',            
        ];
        $rules = [
            'name'=> array('required', 'unique:categories'),
        ];
        
        $this->validate($request, $rules, $messages);

        //$category = Category::create($request->all());
        $categoria=new Category($request->all());
        $categoria->estado = 1;
        $categoria->save();
        
        $cat = $request->name;
        $notificacion="La categoria $cat  se ha añadido correctamente";

        return redirect()->route('admin.categorias.index')->with(compact('notificacion'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $categoria)
    {
        return view('admin.categorias.show', compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $categoria)
    {
        return view('admin.categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $categoria)
    {
        $messages = [
            'name.required' => 'El campo nombre es requerido'
        ];
        $rules = [
            'name'=> array('required', 'unique:categories,name,'.$categoria->id),
        ];
        
        $this->validate($request, $rules, $messages);

        //$categoria->estado = 1;
        $categoria->update($request->all());

        $cat = $request->name;
        $notificacion="La categoria  $cat  se ha actualizado correctamente";

        return redirect()->route('admin.categorias.index')->with(compact('notificacion'));
    }

    public function destroy(Category $categoria)
    {
        $categoria->delete();

        $cat = $categoria->name;
        $notificacion="La categoria  $cat  se ha eliminado correctamente";

        return redirect()->route('admin.categorias.index')->with(compact('notificacion'));
    }

}
