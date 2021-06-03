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

        $response = json_decode($response);

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
        <img src="assets/images/Korian_LogoCouleur.png" alt="" class="w-full">
    </div>
    <div class="contact">
        <img src="assets/images/GROUPE_CONTACT.png" alt="" class="w-full">
    </div>
</header>
<nav class="border border-gray-300">
    <ul class="container grid grid-cols-3 divide-x-2 border-r border-l">
        <li class="menu-item">
            <a href="">
                Accueil
            </a>
        </li>
        <li class="menu-item">
            <a href="">
                Patient
            </a>
        </li>
        <li class="menu-item">
            <a href="">
                Médecin
            </a>
        </li>
    </ul>
</nav>
<div class="slide-wrap container">
    <div class="slide-nav">
        <?php for ($i = 0; $i <= 3; $i++): ?>
            <button></button>
        <?php endfor; ?>
    </div>
</div>
<div class="slider">
    <?php for ($i = 0; $i <= 3; $i++): ?>
        <div class="item relative">
            <img src="assets/images/slide1.png" alt="" class="w-full object-cover">
            <div class="container caption text-5xl md:text-7xl">
                <div class="w-full lg:w-1/2">
                    <span class="font-bask italic font-normal text-primary-default">Clinique du souffle</span>
                    <span class="block font-bask text-primary-default font-bold">Le patient au coeur de nos actions</span>
                </div>
            </div>
        </div>
    <?php endfor; ?>
</div>
<section class="py-20">
    <div class="container">
        <h2 class="text-4xl text-souffle font-bask">Notre philosophie</h2>
        <div class="grid grid-cols-1 lg:grid-cols-2 px-0 lg:px-10">
            <div>
                <p>
                    Leader de leur domaine, les Cliniques du Souffle Korian développent depuis près de 30 ans le concept de la
                    réhabilitation santé. Ce concept se base sur une approche globale et intégrative avec pour objectif de
                    remettre en mouvement le patient, en le rendant acteur de sa propre santé. Cette méthode consiste à associer
                    au traitement médicamenteux classique et nécessaire, un accompagnement physique, psychique et nutritionnel
                    du malade.
                </p>
                <p>
                    Aujourd'hui classée Grade A, l'efficacité de ce domaine est reconnue par toutes les sociétés scientifiques
                    internationales, au point de s'élargir à d'autres pathologies comme les affections métaboliques, de la
                    nutrition, du sommeil et des addictions. En inscrivant la recherche et l'innovation médicale au coeur de sa
                    stratégie, les Cliniques du Souffle ont fortement contribué au développement de cette approche.
                </p>
            </div>
            <div class="flex items-center justify-end">
                <a href="#cliniques" class="btn-link btn-souffle text-souffle">Découvrir nos clinique</a>
            </div>
        </div>
    </div>
</section>
<section class="who-are">
    <div class="container grid grid-cols-1 md:grid-cols-2 text-3xl space-y-10 md:space-y-0">
        <div class="patient flex flex-col items-center justify-center text-souffle">
            <img src="/assets/images/patient.png" alt="" class="block mb-5">
            Vous êtes un patient ?
        </div>
        <div class="nurse flex flex-col items-center justify-center text-primary-default">
            <img src="/assets/images/medical.png" alt="" class="block mb-5">
            Vous êtes un médecin ?
        </div>
    </div>
</section>
<section class="cliniques py-20" id="cliniques">
    <div class="container">
        <h2 class="text-4xl text-souffle font-bask">Nos clinique de soins de Suite et Réadaptation</h2>
        <div class="text-primary-default font-open italic uppercase">Réhabilitation respiratoire et métabolique</div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 py-10">
            <div class="clinique">
                <div class="logo">
                    <img src="/assets/images/solane.png" alt="">
                </div>
                <div class="place">
                    Ossejà
                    <span>PYRÉNÉES-ORIENTALES (66)</span>
                </div>
                <div class="link">
                    <a href="#">
                        En savoir plus >
                    </a>
                </div>
            </div>
            <div class="clinique">
                <div class="logo">
                    <img src="/assets/images/vallonie.png" alt="">
                </div>
                <div class="place">
                    Lodève
                    <span>Hérault (34)</span>
                </div>
                <div class="link">
                    <a href="#">
                        En savoir plus >
                    </a>
                </div>
            </div>
            <div class="clinique">
                <div class="logo">
                    <img src="/assets/images/clarines.png" alt="">
                </div>
                <div class="place">
                    Riom-Ès-Montagnes
                    <span>Cantal (15)</span>
                </div>
                <div class="link">
                    <a href="#">
                        En savoir plus >
                    </a>
                </div>
            </div>
            <div class="clinique">
                <div class="logo">
                    <img src="/assets/images/pontet.png" alt="">
                </div>
                <div class="place">
                    Plateau d’Hauteville
                    <span>Ain (01)</span>
                </div>
                <div class="link">
                    <a href="#">
                        En savoir plus >
                    </a>
                </div>
            </div>
            <div class="clinique">
                <div class="logo">
                    <img src="/assets/images/acacias.png" alt="">
                </div>
                <div class="place">
                    Briançon
                    <span>HAUTES ALPES (05)</span>
                </div>
                <div class="link">
                    <a href="#">
                        En savoir plus >
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="keys bg-gray-100 pt-20 pb-24 md:pb-96">
    <div class="container">
        <h2 class="text-souffle text-4xl font-bask">Chiffres clés</h2>
        <div class="grid md:grid-cols-3 mt-20 lg:px-20 px-0">
            <div class="item">
                <div class="number font-bask italic text-souffle text-7xl">93%</div>
                <div class="sub text-xl text-primary-default uppercase italic font-bold">de patients</div>
                <div class="more italic text-primary-default text-xl uppercase">
                    Très satisfaits <br> de leurs séjours
                </div>
            </div>
            <div class="item">
                <div class="number font-bask italic text-souffle text-7xl">6000</div>
                <div class="sub text-xl text-primary-default uppercase italic font-bold">Patients/ans</div>
                <div class="more italic text-primary-default text-xl uppercase">
                    Venant  de toute <br> la France
                </div>
            </div>
            <div class="item">
                <div class="number font-bask italic text-souffle text-7xl">30</div>
                <div class="sub text-xl text-primary-default uppercase italic font-bold">ans</div>
                <div class="more italic text-primary-default text-xl uppercase">
                    de savoir faire <br> en réhabilitation
                </div>
            </div>
        </div>
    </div>
</section>
<footer class="relative">
    <div class="top-footer absolute"></div>
    <div class="footer-content bg-souffle">
        <div class="container text-white">
            <img src="/assets/images/korian_blanc.png" alt="">
            <div class="contact py-10">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <div class="left mb-10 md:mb-0">
                        <div class="font-bask italic text-2xl">Clinique du souffle <i class="fal fa-registered"></i></div>
                        <div class="text-2xl font-bask uppercase">infoservice</div>
                        <p class="italic mt-5">
                            3055 Avenue de prades <br>
                            66000 Perpignan
                        </p>
                        <a href="#" class="uppercase font-bold">
                            Plan d'accès
                        </a>
                    </div>
                    <div class="right text-right">
                        <div class="mb-10">
                            <a class="btn-link text-white" href="#">cliniquesdusouffle@korian.fr</a>
                        </div>
                         <div class="mb-10">
                            <a class="btn-link text-white flex justify-end items-center" href="#">
                                <span><img src="/assets/images/footer-phone.jpg" alt=""></span>
                            </a>
                        </div>
                        <div class="mb-10">
                            <a class="btn-link text-white" href="#">
                                Nous rejoindre
                            </a>
                        </div>
                        <div class="mb-10">
                            <a class="btn-link text-white" href="#">
                                CHARTE DE PROTECTION
                                DES DONNÉES PERSONNELLES
                            </a>
                        </div>
                    </div>
                </div>
                <div class="form text-center max-w-xl mx-auto" id="form">
                    <h2 class="font-bask text-3xl">Nous contacter</h2>
                    <div class="form-content">
                        <form action="/#form" method="post" class="space-y-5" id="contact-form">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                <input type="text" placeholder="Nom" name="nom">
                                <input type="text" placeholder="Email" name="email">
                            </div>
                            <input type="text" placeholder="Sujet" name="subject">
                            <textarea name="message" id="" cols="30" rows="10" placeholder="Votre message"></textarea>
                            <button class="g-recaptcha"
                                    data-sitekey="6LcQ1QsbAAAAAI6j5AXxSzrfyp4isd2_5WdEzfFt"
                                    data-callback='onSubmit'
                                    data-action='submit' type="submit">envoyer</button>
                        </form>
                    </div>
                </div>
                <div class="text-center mt-10 font-open">
                    <div class="text-3xl md:text-4xl">
                        www.<strong class="font-bold">cliniquesdusouffle</strong>.com
                    </div>
                    Une société du <strong class="font-bold">G</strong>roupe <strong class="font-bold">K</strong>orian
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="https://kit.fontawesome.com/ef35c8849c.js" crossorigin="anonymous"></script>
<script src="https://www.google.com/recaptcha/api.js"></script>
<script>
    function onSubmit(token) {
        document.getElementById("contact-form").submit();
    }
</script>
<script src="dist/js/app.js"></script>
</body>
</html>