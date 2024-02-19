<?php

class Example extends Showcase
{
    private $preview;
    private $subtitle;

    public function __construct($title, $description, $link, $repo, $subtitle, $preview)
    {
        $this->preview = $preview;
        $this->subtitle = $subtitle;
        parent::__construct($title, $description, $link, $repo);
    }

    public function getSubtitle()
    {
        return $this->subtitle;
    }

    public function getPreview()
    {
        return $this->preview;
    }
}