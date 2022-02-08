<?php

namespace App\Messages;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Container\Container;

class CustomMailMessage extends MailMessage {
    public function render()
    {
        return Container::getInstance()->make('mailer')->render(
            $this->view, $this->data()
        );
    }
}
