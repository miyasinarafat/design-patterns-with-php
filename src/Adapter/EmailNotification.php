<?php

namespace miyasinarafat\DesignPatterns\Adapter;

/**
 * Here's an example of the existing class that follows the Target interface.
 *
 * The truth is that many real apps may not have this interface clearly defined.
 * If you're in that boat, your best bet would be to extend the Adapter from one
 * of your application's existing classes. If that's awkward (for instance,
 * SlackNotification doesn't feel like a subclass of EmailNotification), then
 * extracting an interface should be your first step.
 */
class EmailNotification implements Notification
{
    public function __construct(private string $email)
    {
    }

    public function send(string $title, string $message): string
    {
        //mail($this->email, $title, $message);
        return "Sent email with title '$title' to '{$this->email}' that says '$message'.";
    }
}
