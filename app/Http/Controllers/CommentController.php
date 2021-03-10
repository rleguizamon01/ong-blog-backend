<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Post $post){

        return Comment::where('post_id','=',$post->id)->paginate();

    }
    public function show(Post $post,Comment $comment)
    {   if ($post->id = $comment->post_id){
        return $comment;

    }else{
        abort(404);
    }

    }
}
