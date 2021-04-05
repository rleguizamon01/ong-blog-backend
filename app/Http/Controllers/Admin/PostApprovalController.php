<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Support\Facades\Mail;
use App\Mail\PostApproved;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostApprovalController extends Controller
{
    public function publish(Post $post)
    {
        //dar de alta el post
        $post->update([
            'approved_at' => now()
        ]);

        Mail::queue(new PostApproved($post));
    }
}
