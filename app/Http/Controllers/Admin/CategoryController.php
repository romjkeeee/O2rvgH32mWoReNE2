<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::all();
        return view('category.index', compact('data'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(CreateCategoryRequest $request)
    {
        $countries = new Category($request->validated());
        $countries->save();
        return redirect()->route('categories.index');
    }

    public function show(Category $category)
    {
        $data = $category;
        return view('category.show', compact('data'));
    }

    public function edit(Category $category)
    {
        $data = $category;
        return view('category.edit', compact('data'));
    }

    public function update(CreateCategoryRequest $request, Category $category)
    {
        $category->update($request->validated());
        return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
}
