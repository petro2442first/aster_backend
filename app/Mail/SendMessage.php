<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMessage extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $subject;
    public $content;
    public $email;

    public function __construct($subject, $message, $email)
    {
        $this->subject = $subject;
        $this->content  = $message;
        $this->email  = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // dd($this->message);
        return $this->from('info@valians-finance.com')
            ->subject($this->subject)
            ->with([
                'content' => $this->content,
                'email' => $this->email,
                'subject' => $this->subject
            ])
            ->view('mails.send-message');
    }
}
