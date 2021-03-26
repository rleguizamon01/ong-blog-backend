<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Category::class, 'category');
    }

    public function index()
    {
        $categories = Category::withCount('posts')->orderBy('name', 'ASC')->paginate(10);
        return view('admin.categories.index', ['categories' => $categories]);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CategoryRequest $request)
    {
        Category::create($request->all());
        return redirect()->back()->withSuccess('Categoría creada exitosamente');
    }

    public function show(Category $category)
    {
        $category = $category->load(['posts' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }]);

        return view('admin.categories.show', ['category' => $category]);
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', ['category' => $category]);
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->all());
        return redirect()->back()->withSuccess('Categoría editada exitosamente');
    }

    public function destroy(Category $category)
    {  
        Post::where('category_id', $category->id)->delete();

        $category->delete();

        return redirect()->back()->withSuccess('Categoría '. $category->name . ' eliminada exitosamente');
    }
}
