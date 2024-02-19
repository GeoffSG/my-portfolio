<!-- scripts -->
<script src="js/jquery/jquery.min.js"></script>
<script src="js/main.js"></script>
<?php
switch (getSelf()){
    case 'index':
        echo '<script src="js/text-effect.js"></script>';
        break;
    case 'contact-me':
        echo '<script src="js/form-validation.js"></script>';
        break;
}
?>