<?php

namespace miyasinarafat\DesignPatterns\Tests\Adapter;

use miyasinarafat\DesignPatterns\Adapter\EmailNotification;
use miyasinarafat\DesignPatterns\Adapter\Notification;
use miyasinarafat\DesignPatterns\Adapter\SlackApi;
use miyasinarafat\DesignPatterns\Adapter\SlackNotification;
use PHPUnit\Framework\TestCase;

/**
 * @group adapter
 */
class NotificationTest extends TestCase
{
    /** @test */
    public function emailNotification(): void
    {
        $email = 'developers@example.com';
        $notification = $this->handleNotification(new EmailNotification($email));

        $this->assertStringContainsString($email, $notification);
    }

    /** @test */
    public function slackNotification(): void
    {
        $chatId = "#Developers";
        $slackApi = new SlackApi("example.com", "XXXXXXXX");
        $notification = $this->handleNotification(new SlackNotification($slackApi, $chatId));

        $this->assertStringContainsString($chatId, $notification);
    }

    /**
     * @param Notification $notification
     * @return string
     */
    private function handleNotification(Notification $notification): string
    {
        return $notification->send(
            "Website is down!",
            "<strong style='color:red;font-size: 50px;'>Alert!</strong> " .
            "Our website is not responding. Call admins and bring it up!"
        );
    }
}
