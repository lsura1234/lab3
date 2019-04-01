<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
class categoryControllerApi extends Controller
{
    public function category_list(){
        $categories = Category::all();
        return response()->json(array(
            'ok'=>true,
            'categories' => $categories,
        ));
    }
    
}
