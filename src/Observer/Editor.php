<?php

namespace miyasinarafat\DesignPatterns\Observer;

/**
* The concrete publisher contains real business logic that's
* interesting for some subscribers. We could derive this class
* from the base publisher, but that isn't always possible in
* real life because the concrete publisher might already be a
* subclass. In this case, you can patch the subscription logic
* in with composition, as we did here.
 */
class Editor
{
    public EventManager $events;
    private mixed $filename;

    public function __construct()
    {
        $this->events = new EventManager();
    }

    public function openFile(string $filename): void
    {
        $this->filename= $filename;
        $this->events->notify('open', $this->filename);
    }

    public function saveFile(): void
    {
        $this->events->notify('save', $this->filename);
    }
}
