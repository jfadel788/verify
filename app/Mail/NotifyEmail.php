<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;

use Illuminate\Mail\Mailable;

use Illuminate\Queue\SerializesModels;

class NotifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     *
     * @return void
     */
    public $details;
    public function __construct($data)
    {
        $this -> details = $data;

    }
    /**
     * Build the message
     *
     * @return $this

    */
    public function build()
    {
        return $this->view('Emails.notifyEmail');

    }

}
