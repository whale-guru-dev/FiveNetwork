<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class File extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $content;

    public $subtitle;

    public $subject;

    public $files;

    public function __construct($_content, $_subtitle, $_subject, $_files)
    {
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
        $message = $this->view('emails.file')->with(['content'=>$this->content, 'subtitle' => $this->subtitle, 'subject'=>$this->subject]);
        foreach($this->files as $file)
            $message->attach($file);
        return $message;
    }
}
