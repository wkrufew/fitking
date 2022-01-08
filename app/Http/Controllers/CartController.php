<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function addCart($id)
    {
        $product = DB::table('products')->where('id', $id)->first();

        $data = array();
        
        if ($product->discount_price == NULL) {
            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = 1;
            $data['price'] = $product->selling_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = '';
            $data['options']['size'] = '';
            Cart::add($data);

            
        } else {
            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = 1;
            $data['price'] = $product->discount_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = '';
            $data['options']['size'] = '';
            Cart::add($data);
        }
        
    }

    public function check()
    {
        $content = Cart::content();

        return response()->json($content);
    }

    public function showCart()
    {
        $cart = Cart::content();
        return view('pages.cart', compact('cart'));
    }

    public function removeCart($rowId)
    {
        Cart::remove($rowId);
        
        return Redirect()->back()->with('messege2','exito');

    }
    
    public function updateCart(Request $request)
    {
        $rowId = $request->productid;

        $qty = $request->qty;

        Cart::update($rowId, $qty);
        
        return Redirect()->back()->with('messege3','exito');

    }
    
    public function viewProduct($id)
    {
        $product = DB::table('products')->where('id', $id)->first();

        $color = $product->product_color;
        $product_color = explode(',', $color);

        $size = $product->product_size;
        $product_size = explode(',', $size);
        
        return response()->json([
            'product' => $product,
            'color' => $product_color,
            'size' => $product_size,
        ]);

    }

    public function insertCart(Request $request)
    {
        $id = $request->product_id;

        $product = DB::table('products')->where('id', $id)->first();

        $data = array();
        
        if ($product->discount_price == NULL) {
            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = $request->qty;
            $data['price'] = $product->selling_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = $request->color;
            $data['options']['size'] = $request->size;
            Cart::add($data);

            
               return Redirect()->back()->with('messege','Exito');

           
            
        } else {
            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = $request->qty;
            $data['price'] = $product->discount_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = $request->color;
            $data['options']['size'] = $request->size;
            Cart::add($data);

            //return Redirect()->back();

            
            return Redirect()->back()->with('messege','Exito');
        }
    }

    public function Checkout()
    {
        if (Auth::check()) {
            $cart = Cart::content();
            return view('pages.checkout', compact('cart'));
        }else {
            return Redirect()->route('login')->with('messege4','Exito');
        }
        
    }

    public function paymentPage()
    {
        if (Auth::check()) {
            $cart = Cart::content();
            return view('pages.payment', compact('cart'));
        }else {
            return Redirect()->route('login')->with('messege4','Exito');
        }
    }

    public function Search(Request $request)
    {
        $item = $request->search;
        $products = DB::table('products')
                        ->where('product_name', 'LIKE', "%$item%")
                        ->get();
        return view('pages.search', compact('products'));
    }

}
