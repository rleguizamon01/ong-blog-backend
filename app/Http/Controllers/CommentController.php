<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(){
        return Comment::latest()->paginate();
    }
    public function show(Comment $comment)
    {
        return $comment;

    }
}
