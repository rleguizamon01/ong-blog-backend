<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Category::class, 'category');
    }

    public function index()
    {
        $categories = Category::withCount('posts')->orderBy('name', 'ASC')->get();
        return view('website.categories.index', ['categories' => $categories]);
    }

    public function create()
    {
        //
    }

    public function store(CategoryRequest $request)
    {
        //
    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        //
    }

    public function update(CategoryRequest $request, Category $category)
    {
        //
    }

    public function destroy(Category $category)
    {
        //
    }
}
