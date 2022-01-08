<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $products = Product::where('product_name', 'LIKE','%'.$search.'%')
                            ->orWhere('product_code', 'LIKE','%'.$search.'%')
                            ->latest()
                            ->paginate(8);

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::where('estado',1)->pluck('name', 'id');
        $subcategories = Subcategory::pluck('subcategory_name', 'id'); 
        $brands = Brand::pluck('brand_name', 'id');  

        return view('admin.products.create', compact('categories', 'subcategories', 'brands'));
    }

    public function store(Request $request, Product $product)
    {
        $messages = [
            'subcategory_id.required' => 'Seleccione una subcategoria',
            'category_id.required' => 'Seleccione una categoria',
            'brand_id.required' => 'Seleccione una marca',
            'product_name.unique' => 'El producto ingresado ya existe',   
            'product_name.required' => 'El campo es requerido',
            'product_code.required' => 'El campo es requerido',
            'product_quantity.required' => 'El campo es requerido',   
            'product_details.required' => 'El campo es requerido', 
            'selling_price.required' => 'El campo es requerido',  
            'file.required' => 'Debe elegir una imagen',
            
        ];
        $rules = [
            'product_name'=> array('required', 'unique:products'),
            'category_id'=> array('required'),
            'subcategory_id'=> array('required'),
            'brand_id'=> array('required'),
            'product_code'=> array('required'),
            'product_quantity'=> array('required'),
            'product_details'=> array('required'),
            'selling_price'=> array('required'),
            'file'=>array('image', 'required'),
        ];
        
        $this->validate($request, $rules, $messages); 

        /*ENCONTRAR LOS NOMBRES */
        $nombreC = $request->category_id;
        $nombreS = $request->subcategory_id;
        $nombreB = $request->brand_id;
        
        $nombrecategoria = Category::find($nombreC);
        $nombresubcategoria = Subcategory::find($nombreS);
        $nombrebrand = Brand::find($nombreB);
        /*FIN DE ENCONTRAR LOS NOMBRES */
        
        $productos=new Product($request->all());
        
        if($request->file('file'))
        {
             $url = Storage::put('products', $request->file('file'));

             $productos->image_one =  $url;
        }

        $productos->category_name = $nombrecategoria->name;
        $productos->subcategory_name = $nombresubcategoria->subcategory_name;
        $productos->brand_name = $nombrebrand->brand_name;
        $productos->save();
        //dd($productos);

       $producto = $request->product_name;
        $notificacion="El producto $producto  se ha añadido correctamente";

        return redirect()->route('admin.products.index')->with(compact('notificacion'));

    }

 
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    
    public function edit(Product $product)
    {
        $categories = Category::where('estado',1)->pluck('name', 'id'); 
        $subcategories = Subcategory::pluck('subcategory_name', 'id');
        $brands = Brand::pluck('brand_name', 'id');

        return view('admin.products.edit', compact('subcategories', 'categories', 'brands', 'product'));
    }

    public function update(Request $request, Product $product)
    {
        $messages = [
            'subcategory_id.required' => 'Seleccione una subcategoria',
            'category_id.required' => 'Seleccione una categoria',
            'brand_id.required' => 'Seleccione una marca',
            'product_name.unique' => 'El producto ingresado ya existe',   
            'product_name.required' => 'El campo es requerido',
            'product_code.required' => 'El campo es requerido',
            'product_quantity.required' => 'El campo es requerido',   
            'product_details.required' => 'El campo es requerido', 
            'selling_price.required' => 'El campo es requerido',  
            
            
        ];
        $rules = [
            'product_name'=> array('required', 'unique:products,product_name,'.$product->id),
            'category_id'=> array('required'),
            'subcategory_id'=> array('required'),
            'brand_id'=> array('required'),
            'product_code'=> array('required'),
            'product_quantity'=> array('required'),
            'product_details'=> array('required'),
            'selling_price'=> array('required'),
            'file'=>array('image'),
        ];

        $this->validate($request, $rules, $messages); 

        /*ENCONTRAR LOS NOMBRES */
        $nombreC = $request->category_id;
        $nombreS = $request->subcategory_id;
        $nombreB = $request->brand_id;
        
        $nombrecategoria = Category::find($nombreC);
        $nombresubcategoria = Subcategory::find($nombreS);
        $nombrebrand = Brand::find($nombreB);
        /*FIN ENCONTRAR LOS NOMBRES */

        if($request->file('file'))
        {
            $url = Storage::put('products', $request->file('file'));

            if ($product->image_one) {
                Storage::delete($product->image_one);

                $product->image_one =  $url;
            }else{
                
                $product->image_one =  $url;
            }
        }
        $product->category_name = $nombrecategoria->name;
        $product->subcategory_name = $nombresubcategoria->subcategory_name;
        $product->brand_name = $nombrebrand->brand_name;

        $product->main_slider = $request->main_slider;
        $product->mid_slider = $request->mid_slider;
        $product->hot_new = $request->hot_new;
        $product->trend = $request->trend;
        $product->hot_deal = $request->hot_deal;

        $product->update($request->all());

        $producto = $request->product_name;
        $notificacion="El producto  $producto  se ha actualizado correctamente";

        return redirect()->route('admin.products.index')->with(compact('notificacion'));
        
    }

    public function destroy(Product $product)
    {
        $product->delete();

        $producto = $product->product_name;
        $notificacion="El producto $producto se elimino correctamente";

        return redirect()->route('admin.products.index')->with(compact('notificacion'));
    }

}
