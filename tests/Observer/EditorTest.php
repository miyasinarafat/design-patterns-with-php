<?php

namespace miyasinarafat\DesignPatterns\Tests\Observer;

use miyasinarafat\DesignPatterns\Observer\Editor;
use miyasinarafat\DesignPatterns\Observer\EmailAlertsListener;
use miyasinarafat\DesignPatterns\Observer\LoggingListener;
use PHPUnit\Framework\TestCase;

/**
 * @group observer
 */
class EditorTest extends TestCase
{
    private Editor $editor;
    private string $file;

    protected function setUp(): void
    {
        $this->editor = new Editor();
        $this->file = '/path/to/log.txt';
    }

    /** @test */
    public function openFileLogging(): void
    {
        $message = 'Someone has opened the file: %s';

        $this->expectOutputString(sprintf($message, $this->file));

        $logger = new LoggingListener($this->file, $message);
        $this->editor->events->attach($logger, 'open');
        $this->editor->openFile($this->file);
    }

    /** @test */
    public function saveFileEmailAlerts(): void
    {
        $email = 'admin@example.com';
        $message = 'Someone has changed the file: %s';

        $this->expectOutputString(sprintf($message, $email));

        $emailAlerts = new EmailAlertsListener($email, $message);
        $this->editor->events->attach($emailAlerts, 'save');
        $this->editor->openFile($this->file);
        $this->editor->saveFile();
    }
}
