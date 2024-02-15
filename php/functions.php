<?php

/**
 * Get the current page name
 */
function getSelf()
{
    if (isset($_SERVER["PHP_SELF"])) {
        $self = basename(trim(trim($_SERVER["PHP_SELF"], ".php")));
    }
    return $self;
}

/**
 * Get the current page name in a human readable format
 */
function getSelfName()
{
    $self = getSelf();
    return strtolower(str_replace("-", " ", str_replace("/", "", $self)));
}

/**
 * Get the content for the current page
 */
function getContent()
{
    $self = getSelf();
    $file = "php/view/" . $self . "/content.php";
    if (!file_exists($file)) {
        return "php/view/index/content.php";
    }
    return $file;
}

/**
 * Get the title for the current page
 */
function getTitle()
{
    return ucwords(getSelfName());
}

/**
 * Display the content wrapper
 */
function displayContentWrapper()
{
    echo "<div class=\"wrapper\">";
    include_once "php/view/header.php";
    include_once getContent();
    include_once "php/view/footer.php";
    echo "</div>";
}
