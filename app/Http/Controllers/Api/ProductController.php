<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product,App\Category;
use Input;  
use DB;
class ProductController extends Controller
{
    // public function __construct(){
    //     $this->middleware('auth');
    // }
    public function product_list($category_id = null){
        if($category_id){
            $products=Product::where('category_id',$category_id)->get();

        }
        else{
            $products = Product::all();
        }
        
        return response()->json(array(
            'ok'=>true,
            'products' => $products,
        ));
    }
    public function product_search(){
        $query = Input::get('query');
        if($query){
            $products=Product::where('name','like','%'.$query.'%')->get();
        }
        else{
            $products=Product::all();
        }
        return response()->json(array(
            'ok'=>true,
            'products' => $products,
        ));
    }
    public function get_product_chart(){
        $products = Product::all();
        $product_names = array();
        $product_prices = array();
        foreach($products as $product){
            $product_names[]=$product['code'];
            $product_prices[]=$product['price'];
        }
         return response()->json(array('ok'=>true,
        'product_names' => $product_names,
        'product_prices' => $product_prices,
        ));
    }
    public function get_category_chart(){
        $categories = DB::select('select a.name,(select sum(b.price) from product b where b.category_id=a.id) as price from category a');
        $cat_names = array();
        $cat_prices = array();
        foreach($categories as $c){
            $cat_names[] = $c->name ;
            $cat_prices[] = $c->price;
        }
        return response()->json(array('ok' => true,
        'cat_names'=>$cat_names,
        'cat_prices' => $cat_prices,
        ));
    }
}
