<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        
        return view('admin.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brands.create');
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
            'brand_name.required' => 'El campo nombre es requerido',
            'file.image' => 'El archivo que intentaste subir no es una imagen',
            'file.required' => 'Debe elegir una imagen',
            //'file.mimes'=>'No es una imagen',
        ];
        $rules = [
            'brand_name'=> array('required'),
            'file'=>array('image', 'required'),
            //'file' => array('mimes:jpeg,png,jpg'),
        ];
        
        $this->validate($request, $rules, $messages);
        
        //$course = Course::create($request->all());
        
        $brand=new Brand($request->all());

        if($request->file('file'))
        {
             $brand_logo = Storage::put('marcas', $request->file('file'));

             $brand->brand_logo =  $brand_logo;
        }

        $brand->save();

        $marca = $request->brand_name;
        $notificacion="La marca $marca se ha creado correctamente";

        return redirect()->route('admin.brands.index')->with(compact('notificacion'));
        //return $request->all();   ->with(compact('notificacion'))

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        return view('admin.brands.show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $messages = [
            'brand_name.required' => 'El campo nombre es requerido',
            'file.image' => 'El archivo que intentaste subir no es una imagen',
            
            //'file.mimes'=>'No es una imagen',
        ];
        $rules = [
            'brand_name'=> array('required', 'unique:brands,brand_name,'.$brand->id),
            'file'=>array('image'),
            //'file' => array('mimes:jpeg,png,jpg'),
        ];
        
        $this->validate($request, $rules, $messages);

        if($request->file('file'))
        {
            $brand_logo = Storage::put('marcas', $request->file('file'));

            if ($brand->brand_logo) {
                Storage::delete($brand->brand_logo);

                $brand->brand_logo =  $brand_logo;
            }else{
                
                $brand->brand_logo =  $brand_logo;
            }
        }

        $brand->update($request->all());


        $marca = $request->brand_name;
        $notificacion="La marca $marca se actualizado correctamente";

        return redirect()->route('admin.brands.index')->with(compact('notificacion'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();

        $marca = $brand->brand_name;
        $notificacion="La marca $marca se elimino correctamente";

        return redirect()->route('admin.brands.index')->with(compact('notificacion'));
    }
}
