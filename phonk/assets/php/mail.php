<?php
$errorMessage = null;
$successMessage = null;

if ($_POST) {
    $name = isset($_POST['name']) ? filter_var($_POST['name'], FILTER_SANITIZE_STRING) : null;
    $email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) : null;
    $subject = isset($_POST['subject']) ? filter_var($_POST['subject'], FILTER_VALIDATE_EMAIL) : null;
    $message = htmlspecialchars($_POST['message']);

    if (empty($name) || empty($email) || empty($message) || empty($subject)) {
        $errorMessage = 'Wypełnij wszystkie pola!';
    }

    if (is_null($errorMessage)) {
        mail(
            'redsowski@gmail.com',
            'Formularz kontaktowy',
            "Treść wiadomości: $message \n\n Imię: $name \n\n Adres e-mail: $email \n\n Temat: $subject",
            "From: $name <$email>"
        );

        $successMessage = 'Wiadomość została wysłana';
    }
}
?>
