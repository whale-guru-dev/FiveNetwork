<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Follow extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $link;

    public $link_name;

    public $content;

    public $subtitle;

    public $subject;

    public function __construct($_link, $_link_name, $_content, $_subtitle, $_subject)
    {
        $this->link = $_link;
        $this->link_name = $_link_name;
        $this->content = $_content;
        $this->subject = $_subject;
        $this->subtitle = $_subtitle;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.temple')->with(['link'=>$this->link, 'link_name'=>$this->link_name, 'content'=>$this->content, 'subtitle' => $this->subtitle, 'subject'=>$this->subject]);
    }
}
