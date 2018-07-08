<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Highlight extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $link;

    public $content;

    public $subject;

    public function __construct($_link, $_content, $_subject)
    {
        $this->link = $_link;
        $this->content = $_content;
        $this->subject = $_subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.highlight')->with(['content' => $this->content, 'link' => $this->link, 'subject' => $this->subject]);
    }
}
