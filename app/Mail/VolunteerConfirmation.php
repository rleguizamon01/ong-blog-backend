<?php

namespace App\Mail;

use App\Http\Requests\VolunteerRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VolunteerConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    protected $first_name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($first_name)
    {
        $this->first_name = $first_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.volunteers.confirmation')
                    ->with([
                        'first_name' => $this->first_name,
                        'url' => route('home'),
                        ]);
    }
}
