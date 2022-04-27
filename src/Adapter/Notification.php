<?php

namespace miyasinarafat\DesignPatterns\Adapter;

/**
 * The Target interface represents the interface that your application's classes already follow.
 */
interface Notification
{
    public function send(string $title, string $message): string;
}
