<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Support extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'supportverzoeken@gmail.com';

        $name = 'Supportverzoek';

        $subject = 'Nieuw Support aanvraag';

        return $this->view('email')
            ->from($address, $name)
            ->subject($subject);


    }
}
