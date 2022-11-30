<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    
    public function index($id = 0)
    {
        $result = [];

        if ($id) {
            $result = Product::find($id);
        } else {
            $result = Product::get([
                'id',
                'category_id',
                'name',
                'price',
            ])->toJson();
        }

        return response($result)->header('Content-Type', 'application/json');
    }


}
