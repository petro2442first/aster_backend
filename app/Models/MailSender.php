<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailSender extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'subject',
        'message'
    ];
    protected $email;
    protected $subject;
    protected $message;
    public function __construct($email, $subject, $message)
    {
        $this->email = $email;
        $this->subject = $subject;
        $this->message = $message;
    }
}
