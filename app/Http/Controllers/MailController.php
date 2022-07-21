<?php

namespace App\Http\Controllers;

use App\Mail\SendMessage;
use App\Models\MailSender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMessage(Request $request)
    {
        $message = $request->message;
        $email = $request->email;
        $subject = $request->subject;
        Mail::to(env('MAIL_FROM_ADDRESS', 'info@valians-finance.com'))->send(new SendMessage($subject, $message, $email));
        return redirect()->back();
    }
}
