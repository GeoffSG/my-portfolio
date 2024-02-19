<?php
// Include the JSONReader class
require_once __DIR__ . '/../model/JSONReader.php';
require_once __DIR__ . '/../classes/Showcase.php';


// Create an instance of the JSONReader class
$JsonPath = __DIR__ . '/../model/showcase.json';
// Read the JSON data
$data = JsonReader::readJSON($JsonPath);

$showcases = array();

// Process the data
foreach ($data['showcases'] as $showcase) {
    $title = $showcase['title'];
    $description = $showcase['description'];
    $link = $showcase['link'];
    $repo = $showcase['repo'];

    // Create a new instance of the Showcase class
    $showcases[] = new Showcase($title, $description, $link, $repo);
}

$JsonPath = __DIR__ . '/../model/examples.json';

$examples = array();

foreach (JsonReader::readJSON($JsonPath)['examples'] as $example) {
    $title = $example['title'];
    $description = $example['description'];
    $link = $example['link'];
    $repo = $example['repo'];
    $preview = $example['preview'];
    $subtitle = $example['subtitle'];

    $examples[] = new Example($title, $description, $link, $repo, $subtitle, $preview);
}


