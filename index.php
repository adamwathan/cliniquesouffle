<?php
    require 'tpl/header.php';
?>
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
        <div class="grid grid-cols-1 lg:grid-cols-2 px-0 lg:px-5">
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
                <a href="#cliniques" class="btn-link btn-souffle text-souffle font-bold">Découvrir nos cliniques</a>
            </div>
        </div>
    </div>
</section>
<section class="who-are">
    <div class="container grid grid-cols-1 md:grid-cols-2 text-4xl space-y-10 md:space-y-0 italic font-bold">
        <div class="patient flex flex-col items-center justify-center text-souffle">
            <img src="assets/images/patient.png" alt="" class="block mb-5">
            Vous êtes un patient ?
        </div>
        <div class="nurse flex flex-col items-center justify-center text-primary-default">
            <img src="assets/images/medical.png" alt="" class="block mb-5">
            Vous êtes un médecin ?
        </div>
    </div>
</section>
<section class="cliniques py-20" id="cliniques">
    <div class="container">
        <h2 class="text-4xl text-souffle font-bask">Nos cliniques de soins de Suite et Réadaptation</h2>
        <div class="text-primary-default font-open italic uppercase text-3xl">Réhabilitation respiratoire et métabolique</div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 py-10">
            <div class="clinique">
                <div class="logo">
                    <img src="assets/images/solane.png" alt="">
                </div>
                <div class="place">
                    Ossejà
                    <span>PYRÉNÉES-ORIENTALES (66)</span>
                </div>
                <div class="link">
                    <a href="http://www.cliniquedusoufflelasolane.fr/" target="_blank">
                        En savoir plus >
                    </a>
                </div>
            </div>
            <div class="clinique">
                <div class="logo">
                    <img src="assets/images/vallonie.png" alt="">
                </div>
                <div class="place">
                    Lodève
                    <span>Hérault (34)</span>
                </div>
                <div class="link">
                    <a href="http://www.cliniquedusoufflelavallonie.fr/" target="_blank">
                        En savoir plus >
                    </a>
                </div>
            </div>
            <div class="clinique">
                <div class="logo">
                    <img src="assets/images/clarines.png" alt="">
                </div>
                <div class="place">
                    Riom-Ès-Montagnes
                    <span>Cantal (15)</span>
                </div>
                <div class="link">
                    <a href="http://www.cliniquedusoufflelesclarines.fr/" target="_blank">
                        En savoir plus >
                    </a>
                </div>
            </div>
            <div class="clinique">
                <div class="logo">
                    <img src="assets/images/pontet.png" alt="">
                </div>
                <div class="place">
                    Plateau d’Hauteville
                    <span>Ain (01)</span>
                </div>
                <div class="link">
                    <a href="http://www.le-pontet.org/" target="_blank">
                        En savoir plus >
                    </a>
                </div>
            </div>
            <div class="clinique">
                <div class="logo">
                    <img src="assets/images/acacias.png" alt="">
                </div>
                <div class="place">
                    Briançon
                    <span>HAUTES ALPES (05)</span>
                </div>
                <div class="link">
                    <a href="https://www.korian.fr/clinique-ssr/ssr-korian-les-acacias-briancon-05100" target="_blank">
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
                <div class="number font-bask italic text-souffle text-8xl">93%</div>
                <div class="sub text-xl text-primary-default uppercase italic font-bold">de patients</div>
                <div class="more italic text-primary-default text-xl uppercase">
                    Très satisfaits <br> de leurs séjours
                </div>
            </div>
            <div class="item">
                <div class="number font-bask italic text-souffle text-8xl">6000</div>
                <div class="sub text-xl text-primary-default uppercase italic font-bold">Patients/ans</div>
                <div class="more italic text-primary-default text-xl uppercase">
                    Venant  de toute <br> la France
                </div>
            </div>
            <div class="item">
                <div class="number font-bask italic text-souffle text-8xl">30</div>
                <div class="sub text-xl text-primary-default uppercase italic font-bold">ans</div>
                <div class="more italic text-primary-default text-xl uppercase">
                    de savoir faire <br> en réhabilitation
                </div>
            </div>
        </div>
    </div>
</section>
<?php
require 'tpl/bas.php';