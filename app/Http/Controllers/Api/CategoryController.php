<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index($id = 0)
    {
        $result = [];

        if ($id) {
            $result = Category::find($id);
        } else {
            $result = Category::get([
                'id',
                'parent_id',
                'name',
            ])->toJson();
        }

        return response($result)->header('Content-Type', 'application/json');
    }
}
