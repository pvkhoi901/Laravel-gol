<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CanvaseeMail extends Mailable
{
    use Queueable, SerializesModels;


    public $details;
    public $title;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details, $title)
    {
        $this->details = $details;
        $this->title = $title;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->title)
            ->view('email.canvasee_template')
            ->with([
                'details' => $this->details,
                'title' => $this->title,
            ]);;
    }
}
