<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var string
     */
    private $url;

    /**
     * Create a new message instance.
     * @param string $url
     */
    public function __construct(string $url)
    {
        $this->url = $url;
    }

    /**
     * Build the message.
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.forget-password')
                    ->subject('Reset your password')
                    ->with(['url' => $this->url]);
    }
}
