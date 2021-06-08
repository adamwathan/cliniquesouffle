<footer class="relative">
    <div class="top-footer absolute"></div>
    <div class="footer-content bg-souffle">
        <div class="container text-white">
            <img src="assets/images/korian_blanc.png" alt="">
            <div class="contact py-10">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <div class="left mb-10 md:mb-0">
                        <div class="font-bask italic text-2xl">Clinique du souffle <i class="fal fa-registered"></i></div>
                        <div class="text-2xl font-bask uppercase">infoservice</div>
                        <p class="italic mt-5">
                            3055 Avenue de prades <br>
                            66000 Perpignan
                        </p>
                        <a href="https://goo.gl/maps/durZKjkNBJD174d2A" target="_blank" class="uppercase font-bold text-white">
                            Plan d'accès
                        </a>
                    </div>
                    <div class="right text-right">
                        <div class="mb-10">
                            <a class="btn-link text-white" href="#">cliniquesdusouffle@korian.fr</a>
                        </div>
                        <div class="mb-10">
                            <a class="btn-link text-white flex justify-end items-center" href="#">
                                <span><img src="assets/images/footer-phone.jpg" alt=""></span>
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
                            <?php if (!empty($_POST)): ?>
                                <?php if (!$error): ?>
                                    <div class="p-3 bg-primary-default text-white">
                                        Votre message a bien été envoyé.
                                    </div>
                                    <?php else: ?>
                                    <div class="p-3 bg-red-800 text-white">
                                        Une erreur est survenue, veuillez réessayer.
                                    </div>
                                <?php endif; ?>

                            <?php endif; ?>
                            <button class="g-recaptcha"
                                    data-sitekey=""
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