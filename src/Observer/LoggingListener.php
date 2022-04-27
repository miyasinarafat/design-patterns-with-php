<?php

namespace miyasinarafat\DesignPatterns\Observer;

use JsonException;
use SplSubject;

class LoggingListener implements EventListener
{
    public function __construct(private string $filename, private string $message)
    {
        if (file_exists($this->filename)) {
            unlink($this->filename);
        }
    }

    /**
     * @param SplSubject $subject
     * @param string|null $event
     * @param mixed|null $data
     * @return void
     * @throws JsonException
     */
    public function update(SplSubject $subject, string $event = null, mixed $data = null): void
    {
        //$entry = date("Y-m-d H:i:s") . ": '$event' with data '" . json_encode($data, JSON_THROW_ON_ERROR) . "'\n";
        //file_put_contents($this->filename, $entry, FILE_APPEND);

        echo sprintf($this->message, $this->filename);
    }
}
