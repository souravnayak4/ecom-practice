<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SubadmindetailsMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $subadmin;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subadmin)
    {
        $this->subadmin= $subadmin;
    }

    public function build()
    {
        $from_name = "ecom";
        $from_email = "sn5369557@gmail.com";
        $subject = "you are now admin";
        return $this->from($from_email, $from_name)
        ->view('emails.subadmin')
        ->subject($subject)
        ;
    }
}
