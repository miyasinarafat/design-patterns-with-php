<?php

namespace miyasinarafat\DesignPatterns\Observer;

use SplObserver;
use SplSubject;

/**
 * The base publisher class includes subscription management code and notification methods.
 */
class EventManager implements SplSubject
{
    private array $observers = [];

    public function __construct()
    {
        // A special event group for observers that want to listen to all events.
        $this->observers["*"] = [];
    }

    public function attach(SplObserver $observer, string $event = "*"): void
    {
        $this->initEventGroup($event);

        $this->observers[$event][] = $observer;
    }

    public function detach(SplObserver $observer, string $event = "*"): void
    {
        foreach ($this->getEventObservers($event) as $key => $s) {
            if ($s === $observer) {
                unset($this->observers[$event][$key]);
            }
        }
    }

    public function notify(string $event = "*", $data = null): void
    {
        foreach ($this->getEventObservers($event) as $observer) {
            $observer->update($this, $event, $data);
        }
    }

    /**
     * @param string $event
     * @return void
     */
    private function initEventGroup(string $event = "*"): void
    {
        if (!isset($this->observers[$event])) {
            $this->observers[$event] = [];
        }
    }

    /**
     * @param string $event
     * @return array
     */
    private function getEventObservers(string $event = "*"): array
    {
        $this->initEventGroup($event);
        return $this->observers[$event];
    }
}
