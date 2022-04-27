<?php

namespace miyasinarafat\DesignPatterns\Adapter;

/**
 * The Adapter is a class that links the Target interface and the Adaptee class.
 * In this case, it allows the application to send notifications using Slack
 * API.
 */
class SlackNotification implements Notification
{
    public function __construct(private SlackApi $slack, private string $chatId)
    {
    }

    /**
     * An Adapter is not only capable of adapting interfaces, but it can also
     * convert incoming data to the format required by the Adaptee.
     */
    public function send(string $title, string $message): string
    {
        $slackMessage = "#" . $title . "# " . strip_tags($message);
        $this->slack->logIn();

        return $this->slack->sendMessage($this->chatId, $slackMessage);
    }
}
