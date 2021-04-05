<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Post $post
     * @param $post_id
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
        return view('website.comments.index', [
            'comments' => $post->comments
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post)
    {
        return view('website.comments.create', ['post' => $post]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CommentRequest $request
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request, Post $post)
    {
        $post->comments()->create([
            'email' => $request->input('email'),
            'ip' => $request->ip(),
            'body' => $request->input('body'),
        ]);

        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post, Comment $comment)
    {
        return $comment;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post, Comment $comment)
    {
        $this->authorize('update-comment', $comment);

        return view('website.comments.edit', [
            'post' => $post,
            'comment' => $comment,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post, Comment $comment)
    {
        $this->authorize('update-comment', $comment);

        $comment->update(
            $request->merge(['ip' => $request->ip()])
        );

        return $comment;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $this->authorize('delete-comment', $comment);

        $comment->delete();

        return back();
    }
}
