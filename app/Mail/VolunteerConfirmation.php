<?php

namespace App\Mail;

use App\Models\Volunteer;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VolunteerConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $volunteer;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Volunteer $volunteer)
    {
        $this->volunteer = $volunteer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.volunteers.confirmation')
            ->to($this->volunteer->email)
            ->with([
                'first_name' => $this->volunteer->first_name,
                'url' => route('home'),
            ]);
    }
}
