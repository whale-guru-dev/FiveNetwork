<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Monthly extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $link;

    public $subject;

    public function __construct($_link, $_subject)
    {
        $this->link = $_link;
        $this->subject = $_subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.monthly')->with(['link'=>$this->link, 'subject'=>$this->subject]);
    }
}
