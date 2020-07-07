<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @group Categories
 *
 * APIs for
 */
class CategoryController extends Controller
{
    /**
     * Category list
     *
     * @response 200
     */
    public function index()
    {
        return response(Category::all());
    }
}
