<?php
$BASE_PATH = 'http://localhost/universite-app';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Univ</title>
    <link rel="stylesheet" href="<?=$BASE_PATH?>/assets/css/stylea.css">
</head>
<body>
    <header>
        
        <nav>
            <a href="#">ACCUEIL</a>
            <a href="#">A PROPOS</a>
            <a href="#">SERVICES</a>
            <a href="#">CATEGORIES</a>
            <a href="<?= $BASE_PATH ?>/views/public/login.php">PORTAIL</a>
            <a href="#">CONTACT</a>
        </nav>
    </header>
    <section class="baniere" id="baniere">
        <div class="contenu">
            <h1>Développez votre <span>expertise </span>, <span>programmez </span> votre avenir !</h1>
            <h5>Avec <span>Code Conquest university</span>, formez-vous dans les technologies du numérique et devenez expert dans les domaines qui vous passionnent.</h5>
        </div>
    </section>

    <section class="row">
        
        <div class="row-2">
            <h2><span>A</span> PROPOS</h2>
            <p>
                Avec Code conquest university, tu construis ton parcours en fonction de ce que tu veux faire, avec des formations qui s’adaptent à ton niveau, à ton rythme et surtout à tes ambitions.
Du post Bac au Bac+5, on te forme sur les technos et les métiers qui bougent, avec des diplômes d’État et européens reconnus, que tu partes sur du dev / du réseau / de la data / de la cybersécurité ou de la gestion de projets IT.
Tout ce que tu apprends, c’est du concret et directement connecté aux outils et aux usages pros d’aujourd’hui…et de demain !
            </p>
        </div>
        <div class="row-1">
            
            <img src="<?=$BASE_PATH?>/assets/img/img1.jpg" alt="" width="600px" height="550px">
            
        </div>
        
        
    </section>
<section class="cata">
        <h2><span>N</span>os <span>F</span>ormations</h2>
        <div class="categorie">
        <div class="cate">
            <img src="<?=$BASE_PATH?>/assets/img/plat1.png" alt="">
            <h3>BTS Services Informatiques aux organisations</h3>
            <p>forme en deux ans des techniciens capables de développer des applications ou gérer des réseaux et systémes informatiques au sein des entreprises.</p>
        </div>

        <div class="cate">
            <img src="<?=$BASE_PATH?>/assets/img/plat2.png" alt="">
            <h3>Bachelor Ingénierie Cybersécurité - Cloud- Infrastructures Sécurisées</h3>
            <p>forme en un an des professionnels capables d'administrer, de sécuriser et de piloter de infrstructures informatiques et cloud</p>
        </div>

        <div class="cate">
            <img src="<?=$BASE_PATH?>/assets/img/plat3.png" alt="">
            <h3>Bachelor Concepteur Développeur Full Stack</h3>
            <p>forme en un an des professionnels capables de concevoir, développer et maintenir des applications web ou mobiles complètes, en maitrisant à la fois le front-end et le back-end</p>
        </div>

        <div class="cate">
            <img src="<?=$BASE_PATH?>/assets/img/plat4.png" alt="">
            <h3>Mastère Expert Cybersécurité Cloud Computing </h3>
            <p>forme en deux ans des spécialistes capables de concevoir, sécuriser et piloter des architectures informatques et cloud</p>
        </div>

        <div class="cate">
            <img src="<?=$BASE_PATH?>/assets/img/plat5.png" alt="">
            <h3>Mastère Expert Lead Développeur Full stack</h3>
            <p>forme en deux ans des experts capables de concevoir, piloter et sécuriser des projets web et mobiles complexes</p>
        </div>

        
    </div>
    </section>
    <section class="cata">
        <h2><span>P</span>aroles <span>D</span> 'étudiants</h2>
        <p>
            Ce sont les étudiants qui nous parlent le mieux
        </p>
        <div class="serv">
        <div class="services">
            <h3>Youssef Arnold : M1 LEAD DEV FULLSTACK</h3>
            <p>J'ai vraiment aimé la pédagogie mise en place cette année; grace au programme structuré et enrichissant proposé par Francois Hervé</p>
        </div>

        <div class="services">
            <h3>Ramaya fatim: BACH CDA</h3>
            <p>J'ai vraiment aimé la pédagogie mise en place cette année; grace au programme structuré et enrichissant proposé par Francois Hervé</p>
        </div>
        

        <div class="services">
            <h3>Hakim mané: BTS SIO</h3>
            <p>J'ai vraiment aimé la pédagogie mise en place cette année; grace au programme structuré et enrichissant proposé par Francois Hervé</p>
        </div>
        

        <div class="services">
            <h3>Hassan Mballa: BTS SIO</h3>
            <p>J'ai vraiment aimé la pédagogie mise en place cette année; grace au programme structuré et enrichissant proposé par Francois Hervé</p>
        </div>
        </div>

        
    </div>
    </section>

    

    <section class="contact">
        <h2><span>C</span>ONTACTEZ <span>N</span>OUS</h2>
        <div class="form">
            <form action="">
                <label for="Nom">Nom</label>
                <input type="text" id="nom" name="nom" required>
                
                <label for="e-mail">Adresse e-mail</label>
                <input type="email" id="email" name="email" required>

                <label for="sujet">Sujet</label>
                <input type="text" name="subjet" id="subject" required>

                <label for="message">Message</label>
                <textarea name="message" id="message" rows="10">Ecrivez votre message...</textarea>

                <button type="submit">Envoyer</button>

            </form>
       

        <div class="lien">
            <h3>Suivez-nous</h3>
            <a href="#">X</a>
            <a href="#">Facebook</a>
            <a href="#">Instagram</a>
            <a href="#">Whatsapp</a>
        </div>

        <div class="footer">
            <p>Email : kamdoumchanl82@gmail.com</p>
            <p>Téléphone : 6 91 95 49 14</p>
            <p>Adresse : Biyem-assi(Rue des coctiers), Yaoundé, Cameroun</p>
            <p><a href="#">Politique de confidentialité</a></p>
        </div>
    </div>
    </section>

    <footer>Copy right</footer>
</body>
</html>