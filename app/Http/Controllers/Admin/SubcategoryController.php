<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubcategoryController extends Controller
{
    public function index()
    {
        $subcategories = Subcategory::all();

        return view('admin.subcategories.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('estado',1)->pluck('name', 'id'); 

        return view('admin.subcategories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Category $category)
    {
        $messages = [
            'subcategory_name.required' => 'El campo nombre es requerido',
            'subcategory_name.unique' => 'La subcategoria ingresada ya existe',   
            'category_id.required' => 'Seleccione una categoria es requerido',         
        ];
        $rules = [
            'subcategory_name'=> array('required', 'unique:subcategories'),
            'category_id'=> array('required'),
        ];
        
        $this->validate($request, $rules, $messages);      

        $nombre = $request->category_id;
        $nombrecategoria = Category::find($nombre);
        $subcategoria = Subcategory::create([
            'subcategory_name' => $request->subcategory_name,
            'category_name' => $nombrecategoria->name,
            'category_id' => $request->category_id
        ]);
        
       $sub = $request->subcategory_name;
        $notificacion="La subcategoria $sub  se ha añadido correctamente";

        return redirect()->route('admin.subcategories.index')->with(compact('notificacion'));
        //dd($subcategoria);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategory $subcategory)
    {
        return view('admin.subcategories.show', compact('subcategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategory $subcategory)
    {
        $categories = Category::where('estado',1)->pluck('name', 'id'); 

        return view('admin.subcategories.edit', compact('subcategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcategory $subcategory, Category $category)
    {
        $messages = [
            'subcategory_name.required' => 'El campo nombre es requerido'
        ];
        $rules = [
            'subcategory_name'=> array('required', 'unique:subcategories,subcategory_name,'.$subcategory->id),
        ];
        
        $this->validate($request, $rules, $messages);

        $nombre = $request->category_id;
        $nombrecategoria = Category::find($nombre);
        
        $subcategory->update([
            'subcategory_name' => $request->subcategory_name,
            'category_name' => $nombrecategoria->name,
            'category_id' => $request->category_id
        ]);


        //$subcategory->update($request->all());

        $cat = $request->subcategory_name;
        $notificacion="La subcategoria  $cat  se ha actualizado correctamente";

        return redirect()->route('admin.subcategories.index')->with(compact('notificacion'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();

        $cat = $subcategory->name;
        $notificacion="La categoria  $cat  se ha eliminado correctamente";

        return redirect()->route('admin.subcategories.index')->with(compact('notificacion'));
    }
}
