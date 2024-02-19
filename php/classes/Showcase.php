<?php

class Showcase {
    private $title;
    private $description;
    private $link;
    private $repo;

    public function __construct($title, $description, $link, $repo) {
        $this->title = $title;
        $this->description = $description;
        $this->link = $link;
        $this->repo = $repo;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getLink() {
        return $this->link;
    }

    public function getRepo() {
        return $this->repo;
    }
}