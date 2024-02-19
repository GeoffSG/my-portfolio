<?php
$formSuccess = false;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {

        $db = new DatabaseController();
        $controller = new ContactMeController($db);
        $formSuccess = $controller->send();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "<br>";
    }
    // echo "<script>console.log('name: $name, email: $email, subject: $subject, message: $message')</script>";
} else {
    echo "<script>console.log('No POST request')</script>";
}
?>

<?php if ($formSuccess) : ?>
    <div class="form-success">
        <p>Thank you for contacting me. I will get back to you as soon as possible.</p>
    </div>
<?php endif; ?>
<form id="#form" class="form-contact" action="<?= getSelf() ?>#form" method="post">
    <div class="form-group">
        <label for="first-name"></label>
        <input class="form-input" type="text" placeholder="First Name" name="first_name" id="first_name">
    </div>
    <div class="form-group">
        <label for="last-name"></label>
        <input class="form-input" type="text" placeholder="Last Name" name="last_name" id="last_name">
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