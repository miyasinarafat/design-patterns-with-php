<?php

namespace miyasinarafat\DesignPatterns\Observer;

use SplSubject;

class EmailAlertsListener implements EventListener
{
    public function __construct(
        private string $email,
        private string $message,
    ) {
    }

    public function update(SplSubject $subject, string $event = null, mixed $data = null): void
    {
        // mail($this->email,
        //     "Email Alerts",
        //     "We have a new user. Here's his info: " .json_encode($data));

        echo sprintf($this->message, $this->email);
    }
}
