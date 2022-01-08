<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Ver Dashboard')->only('index');
    }

    public function index()
    {
        $cursos= Course::has('students', '>=', 1)->get();
        $suma =0;
            foreach ($cursos as $item){
            $suma =  $suma + ($item->students_count * $item->price->value);
            }
        /* $r = DB::table('categories as c')
                    ->select('c.id', 'c.name', DB::raw('COUNT(p.id) as num'))
                    ->leftJoin('products as p', 'c.id', 'p.product_type')
                    ->groupBy('c.id')
                    ->get(); */
        
        $data = ['users' => DB::table('users')->where('id', '!=', 1)->count(),
                'comentarios' => DB::table('reviews')->count(),
                'ordenes' => DB::table('orders')->whereBetween('status', [1,3])->sum('total'),
                'reacciones' => DB::table('reviews')->avg('rating'),
                'planes' => DB::table('course_user')->count(),
                'cursos' => $suma,
                'compradores' => DB::table('shipping')->count(),
                'productos' => DB::table('products')->count(),
                'compras' => DB::table('orders') //lista y agrupa si esta repetido a las 5 mayores
                                    ->join('users','orders.user_id','users.id')
                                    ->select('users.name',DB::raw('SUM(orders.total) as total_product'))
                                    ->groupBy('users.name')
                                    ->where('orders.status', '>', 0 )
                                    ->orderBy('total_product', 'desc')
                                    ->take(5)
                                    ->get(),
                'mas' => DB::table('ordersdetails')
                                ->select('product_name',DB::raw('SUM(totalprice) as total_product'),DB::raw('count(totalprice) as cont_product'))
                                ->groupBy('product_name')
                                ->orderBy('total_product', 'desc')
                                ->take(5)
                                ->get(),
                'cantidades' => DB::table('products')
                                        ->select('product_code','product_name','product_quantity')
                                        ->where('product_quantity','<',5)
                                        ->orderBy('product_quantity', 'asc')
                                        ->take(10)
                                        ->get(),
            ];
        return view('admin.index')->with($data);
    }
}
