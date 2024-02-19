<?php

class ContactMeController
{
    private $first_name;
    private $last_name;
    private $email;
    private $subject;
    private $message;

    private $isValidArray = array(
        "first_name" => false,
        "last_name" => false,
        "email" => false,
        "subject" => false,
        "message" => false
    );

    private $errorMessage;

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function send()
    {
        $this->first_name = $_POST['first_name'];
        $this->last_name = $_POST['last_name'];
        $this->email = $_POST['email'];
        $this->subject = $_POST['subject'];
        $this->message = $_POST['message'];

        $this->first_name = htmlspecialchars(strip_tags($this->first_name), ENT_QUOTES, 'UTF-8');
        $this->last_name = htmlspecialchars(strip_tags($this->last_name), ENT_QUOTES, 'UTF-8');
        $this->email = htmlspecialchars(strip_tags($this->email), ENT_QUOTES, 'UTF-8');
        $this->subject = htmlspecialchars(strip_tags($this->subject), ENT_QUOTES, 'UTF-8');
        $this->message = htmlspecialchars(strip_tags($this->message), ENT_QUOTES, 'UTF-8');

        try {
            $this->validate();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
        $sql = "INSERT INTO messages (first_name, last_name, email, subject, message) VALUES ('$this->first_name', '$this->last_name', '$this->email', '$this->subject', '$this->message')";
        try {
            $this->db->connect();
            $this->db->query($sql);
            $this->db->disconnect();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }

        return true;
    }

    private function validate()
    {
        $this->errorMessage = array();

        if (empty($this->first_name)) {
            $this->errorMessage[] = "First name is required";
        } else if (!preg_match("/^[a-zA-Z-' ]*$/", $this->first_name)) {
            $this->errorMessage[] = "Only letters and white space allowed";
        } else if (strlen($this->first_name) > 50) {
            $this->errorMessage[] = "First name must be less than 50 characters";
        } else if (strlen($this->first_name) < 2) {
            $this->errorMessage[] = "First name must be more than 2 characters";
        } else {
            $this->isValidArray["first_name"] = true;
        }

        if (empty($this->last_name)) {
            $this->errorMessage[] = "Last name is required";
        } else if (!preg_match("/^[a-zA-Z-' ]*$/", $this->last_name)) {
            $this->errorMessage[] = "Only letters and white space allowed";
        } else if (strlen($this->last_name) > 50) {
            $this->errorMessage[] = "Last name must be less than 50 characters";
        } else if (strlen($this->last_name) < 2) {
            $this->errorMessage[] = "Last name must be more than 2 characters";
        } else {
            $this->isValidArray["last_name"] = true;
        }

        if (empty($this->email)) {
            $this->errorMessage[] = "Email is required";
        } else if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->errorMessage[] = "Invalid email format";
        } else {
            $this->isValidArray["email"] = true;
        }

        if (empty($this->subject)) {
            $this->errorMessage[] = "Subject is required";
        } else if (strlen($this->subject) > 100) {
            $this->errorMessage[] = "Subject must be less than 100 characters";
        } else if (strlen($this->subject) < 2) {
            $this->errorMessage[] = "Subject must be more than 2 characters";
        } else {
            $this->isValidArray["subject"] = true;
        }

        if (empty($this->message)) {
            $this->errorMessage[] = "Message is required";
        } else if (strlen($this->message) > 1000) {
            $this->errorMessage[] = "Message must be less than 1000 characters";
        } else if (strlen($this->message) < 2) {
            $this->errorMessage[] = "Message must be more than 2 characters";
        } else {
            $this->isValidArray["message"] = true;
        }

        if (!empty($this->errorMessage)) {
            throw new Exception(implode(" - ", $this->errorMessage));
        }

    }

    public function isValid($key)
    {
        return $this->isValidArray[$key];
    }

}