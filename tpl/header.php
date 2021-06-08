<?php

use PHPMailer\PHPMailer\PHPMailer;

require_once 'vendor/autoload.php';
$required = [];
$error = false;
if (!empty($_POST)) {

    $data = array(
        'secret' => "6LcQ1QsbAAAAAG6tkBihRVZE-Eg9YL3zJqV_5ALN",
        'response' => $_POST['g-recaptcha-response']
    );

    $verify = curl_init();
    curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
    curl_setopt($verify, CURLOPT_POST, true);
    curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($verify);

    $response = json_decode($response, true);

    // Nettoyage des données du formulaire
    foreach ($_POST as $key => $value) {
        switch ($key) {
            case 'email':
                if (filter_var($value, FILTER_VALIDATE_EMAIL) === false) {
                    $error[$key] = "Email non valide";
                }
                break;
            default :
                break;
        }
        $_POST[$key] = filter_var($value, FILTER_SANITIZE_STRING);
    }
    // Si pas d'erreurs envoi de l'email.


    if (!$error && $response['success'] == true) {
        $mail = new PHPMailer(true);
        $mail->isHTML(true);

        // For HELO APP Test email
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'host.docker.internal';                     //Set the SMTP server to send through
        $mail->Port       = 2525;

        try {
            $mail->setFrom('contact@korian.fr', 'Groupe Korian');
            $mail->addAddress('manuel@hybride-conseil.fr', $_POST['nom']);
            $mail->Subject = "[CLINIQUE DU SOUFFLE] ".$_POST['subject'];
            $mail->Body    = "<html> Message du formulaire de contact du site cliniquesdusouffle.fr <br> <br>
                <strong>Nom :</strong> {$_POST['nom']} <br>
                <strong>Email :</strong> {$_POST['email']} <br>
                <strong>Message :</strong><br> {$_POST['message']}
                </html>";
            $mail->send();
        } catch (\PHPMailer\PHPMailer\Exception $exception) {
            echo $exception->getMessage();
        }
    }
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,700;1,400&family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.3/tiny-slider.css">
    <link rel="stylesheet" href="dist/css/app.css">
    <title>Accueil - Groupe 5 Santé</title>
</head>
<body>
<header class="container flex flex-col md:flex-row justify-between items-center my-5">
    <div class="logo mb-10 md:mb-0">
        <a href="index.php"><img src="assets/images/Korian_LogoCouleur.png" alt="" class="w-full"></a>
    </div>
    <div class="contact">
        <img src="assets/images/GROUPE_CONTACT.png" alt="" class="w-full">
    </div>
</header>
<nav class="border border-gray-300">
    <ul class="container grid grid-cols-3 divide-x-2 border-r border-l">
        <li class="menu-item">
            <a href="index.php">
                Accueil
            </a>
        </li>
        <li class="menu-item">
            <a href="patient.php">
                Patient
            </a>
        </li>
        <li class="menu-item">
            <a href="medecin.php">
                Médecin
            </a>
        </li>
    </ul>
</nav>