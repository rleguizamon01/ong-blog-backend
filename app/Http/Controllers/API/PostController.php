<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::getPosts($request);

        return response($posts,200);
    }

    public function show(Post $post)
    {
        $post = $post->load(['category', 'user','comments' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])->toJson();

        return response($post,200);
    }

    public function store()
    {
        request()->validate([
            'user_id' => 'required',
            'category_id' => 'required',
            'title' => 'required',
            'body' => 'required',
            'photo' => 'required',
        ]);

        return Post::create([
            'user_id' => request('user_id'),
            'category_id' => request('category_id'),
            'title' => request('title'),
            'body' => request('body'),
            'photo' => request('photo'),
        ]);
    }

    public function update(Post $post)
    {
        request()->validate([
            'user_id' => 'required',
            'category_id' => 'required',
            'title' => 'required',
            'body' => 'required',
            'photo' => 'required',
        ]);

        $success = $post->update([
            'user_id' => request('user_id'),
            'category_id' => request('category_id'),
            'title' => request('title'),
            'body' => request('body'),
            'photo' => request('photo'),
        ]);

        return [
        'success' => $success
        ];
    }

    
    public function destroy(Post $post)
    {
        $success = $post->delete();
        
        return [
            'success' => $success
        ];
    }

    public function destroyforever($id)
    {
        $success = Post::withTrashed()->where('id', $id)->firstOrFail()->forceDelete();

        return [
        'success' => $success
        ];
    }
}