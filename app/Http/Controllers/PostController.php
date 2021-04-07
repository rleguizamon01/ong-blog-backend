<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->authorizeResource(Post::class, 'post');
    }

    public function index(Request $request)
    {
        $categories = Category::withCount('posts')->orderBy('name', 'ASC')->get();
        $totalposts = Post::count();

        $posts = Post::getPosts($request);

        return view('website.posts.index', ['posts' => $posts, 'categories' => $categories, 'totalposts' => $totalposts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::select('id', 'name')->orderBy('name', 'ASC')->get();
        return view('website.posts.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        return auth()->user()->posts()->create(
            $request->merge([
                'photo' => $request->hasFile('photo') ? $request->file('photo')->store('images') : null
            ])
        );
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $post = $post->load(['comments' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }]);

        return view('common.posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::select('id', 'name')->orderBy('name', 'ASC')->get();
        return view('website.posts.edit', ['post' => $post, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        if ($request->hasFile('photo')) {
            $request->file('photo')->store('images');
        }
        $data = $request->merge(['user_id' => Auth::id()]);
        $post->update($data->all());

        return $post;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }

    public function getMorePosts(Request $request)
    {
        if ($request->ajax()) {
            $posts = Post::getPosts($request);
            return view('components.posts.data', ['posts' => $posts])->render();
        }
    }
}
