<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('estado',null)->get();
        
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
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

        $category = Category::create($request->all());
        
        $cat = $request->name;
        $notificacion="La categoria $cat  se ha añadido correctamente";

        return redirect()->route('admin.categories.index')->with(compact('notificacion'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $messages = [
            'name.required' => 'El campo nombre es requerido'
        ];
        $rules = [
            'name'=> array('required', 'unique:categories,name,'.$category->id),
        ];
        
        $this->validate($request, $rules, $messages);

        $category->update($request->all());

        $cat = $request->name;
        $notificacion="La categoria  $cat  se ha actualizado correctamente";

        return redirect()->route('admin.categories.index')->with(compact('notificacion'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        $cat = $category->name;
        $notificacion="La categoria  $cat  se ha eliminado correctamente";

        return redirect()->route('admin.categories.index')->with(compact('notificacion'));
    }
}
