<?php
$db = new DatabaseController();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
}
?>
<form class="form-contact" action="/contact-me" method="post">
    <div class="form-group">
        <label for="first-name"></label>
        <input class="form-input" type="text" placeholder="First Name" name="first_name" id="first_name">
    </div>
    <div class="form-group">
        <label for="last-name"></label>
        <input class="form-input" type="text" placeholder="Last Name" name="first_name" id="first_name">
    </div>
    <div class="form-group">
        <label for="email"></label>
        <input class="form-input" type="text" placeholder="Email" name="email" id="email">
    </div>
    <div class="form-group">
        <label for="subject"></label>
        <input class="form-input" type="text" placeholder="Subject" name="subject" id="subject">
    </div>
    <div class="form-group">
        <label for="message"></label>
        <textarea class="form-input" placeholder="Message" name="message" id="message" rows="10"></textarea>
    </div>
    <div class="btn-group">
        <button class="btn theme-primary" id="reset" type="reset">Reset</button>
        <button class="btn theme-gold" id="submit" type="submit">Submit</button>
    </div>
</form>