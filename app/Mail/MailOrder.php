<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailOrder extends Mailable
{
    use Queueable, SerializesModels;
    public $donhang;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($donhang)
    {
        //
        $this->donhang = $donhang;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('hoang7620345@gmail.com')
            ->view('frontend.mail.checkout')
            ->subject('Đặt hàng tại Gillee Shop');
    }
}
