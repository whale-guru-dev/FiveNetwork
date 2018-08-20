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

    public $subtitle;

    public $files;

    public function __construct($_link, $_content, $_subject, $_subtitle, $_files)
    {
        $this->link = $_link;
        $this->content = $_content;
        $this->subject = $_subject;
        $this->subtitle = $_subtitle;
        $this->files = $_files;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $message = $this->view('emails.highlight')->with(['content' => $this->content, 'link' => $this->link, 'subject' => $this->subject, 'subtitle' => $this->subtitle]);
        foreach($this->files as $file)
            $message->attach($file);

        return $message;
    }
}
