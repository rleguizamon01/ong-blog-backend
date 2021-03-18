<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Post;

class PostApproved extends Mailable
{
    use Queueable, SerializesModels;

    public $post;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown(
            'emails.posts.approved',
            [
                'url' => route('posts.show', ['post' => $this->post->id]),
                'title' => $this->post->title
            ]
        )
            ->subject("Post aceptado");
    }
}
