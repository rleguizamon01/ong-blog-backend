<?php

namespace App\Mail;

use App\Models\Subscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SubscriberConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $subscriber;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subscriber)
    {
        $this->subscriber = $subscriber;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.subscribers.confirm')
            ->with([
                'url' => 'localhost:8000',
                'first_name' => $this->subscriber['first_name'],
            ]);
    }
}
