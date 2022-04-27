<?php

namespace miyasinarafat\DesignPatterns\Adapter;

/**
 * The Adaptee is some useful class, incompatible with the Target interface. You
 * can't just go in and change the code of the class to follow the Target
 * interface, since the code might be provided by a 3rd-party library.
 */
class SlackApi
{
    public function __construct(private string $login, private string $apiKey)
    {
    }

    public function logIn(): void
    {
        // Send authentication request to Slack web service.
        //"Logged in to a slack account '{$this->login}'.";
    }

    public function sendMessage(string $chatId, string $message): string
    {
        // Send message post request to Slack web service.
        return "Posted following message into the '$chatId' chat: '$message'.";
    }
}
