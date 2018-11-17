<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="utf-8">
            <title>Traiteur Écolier pour Enfants: RepaSain</title>
            <link rel="stylesheet" href="css/corp.css"/>
        </head>
        <body class="fr">
            <link rel="stylesheet" href="css/tete.css"/>
            <link rel="stylesheet" href="css/pied.css"/>

            <div class="section_top" id="top">
                <div id="top_logo" >
                    <a class="web_logo" href="accueil.html">
                        <img src="css/img/webLogo.jpg" alt="RepaSain"/>
                    </a>
                    <nav class="top_nav">
                        <ul class="top_nav">
                            <li><a href="faq.html">FAQ</a></li>
                            <li><a href="contact.html">Contact</a></li>
                            <li><a href="commande.html">Commande</a></li>
                            <li><a href="information.html">Information</a></li>
                            <li><a href="accueil.html">Accueil</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <hr>
            <div class="guide" id="guide">
                   <a href="information.html">
                       <img src="css/img/inf.jpg" alt="info">
                   </a>
                   <a href="commande.html">
                       <img src="css/img/commande.jpg" alt="commande">
                   </a>
                   <a href="contact.html">
                       <img src="css/img/contact.jpg" alt="contact">
                   </a>
            </div>
            <hr>

            
            <?php


            if($_SERVER['REQUEST_METHOD'] == 'POST') {


                $nomParent = $_POST['nomParent'];
                $prenomParent = $_POST['prenomParent'];
                $nomEnfant = $_POST['nomEnfant'];
                $prenomEnfant = $_POST['prenomEnfant'];
                $ecole = $_POST['ecole'];
                $age = $_POST['age'];
                $lundi = $_POST['lundi'];
                $mardi = $_POST['mardi'];
                $mercredi = $_POST['mercredi'];
                $jeudi = $_POST['jeudi'];
                $vendredi = $_POST['vendredi'];

                $virgule = ",";


                if (empty($_POST["prenomParent"])) {
                    $prenomParentErr = "Le champ 'Préom du parent' est obligatoire.";
                }elseif (count(explode($virgule, $prenomParent))>1){
                    $prenomParentErr = "Les virgules ne sont pas permises dans le champ 'Préom du parent.";
                }

                if (empty($_POST["nomParent"])) {
                    $nomParentErr = "Le champ 'Nom du parent' est obligatoire.";
                }elseif (count(explode($virgule, $nomParent))>1){
                    $nomParentErr = "Les virgules ne sont pas permises dans le champ 'Nom du parent.";
                }

                if (empty($_POST["prenomEnfant"])) {
                    $prenomEnfantErr = "Le champ 'Prénom de l'enfant' est obligatoire.";
                }elseif (count(explode($virgule, $prenomEnfant))>1){
                    $prenomEnfantErr = "Les virgules ne sont pas permises dans le champ 'Prénom de l'enfant'.";
                }

                if (empty($_POST["nomEnfant"])) {
                    $nomEnfantErr = "Le champ 'Nom de l'enfant' est obligatoire.";
                }elseif (count(explode($virgule, $nomEnfant))>1){
                    $nomEnfantErr = "Les virgules ne sont pas permises dans le champ 'Nom de l'enfant'.";
                }

                if (empty($_POST["ecole"])) {
                    $ecoleErr = "Le champ 'Ecole' est obligatoire.";
                }elseif (count(explode($virgule, $ecole))>1){
                    $ecoleErr = "Les virgules ne sont pas permises dans le champ 'Ecole'.";
                }

                if (empty($_POST["age"])) {
                    $ageErr = "Le champ 'Age' est obligatoire.";
                }elseif ($age < 4 || $age > 12){
                    $ageErr = "Le champ 'Âge' doit être un entier positif entre 4 et 12 inclusivement.";
                }

                if($lundi == 1) {
                    $lundi = "Poulet general tao";
                }elseif ($lundi == 2) {
                    $lundi = "Pate Chinois";
                }else {
                    $lundiErr = "Au moin un choix de repas doit être fait au Lundi.";
                }

                if($mardi == 1) {
                    $mardi = "Macaroni fromage";
                }elseif ($mardi == 2) {
                    $mardi = "Hamburger";
                }else {
                    $mardiErr = "Au moin un choix de repas doit être fait au Mardi.";
                }

                if($mercredi == 1) {
                    $mercredi = "Spaghetti";
                }elseif ($mercredi == 2) {
                    $mercredi = "Lasagne";
                }else {
                    $mercrediErr = "Au moin un choix de repas doit être fait au mercredi.";
                }

                if($jeudi == 1) {
                    $jeudi = "Pennine sauce viande";
                }elseif ($jeudi == 2) {
                    $jeudi = "Pizza tamate fromage";
                }else {
                    $jeudiErr = "Au moin un choix de repas doit être fait au jeudi.";
                }

                if($vendredi == 1) {
                    $vendredi = "Pilaf au saumon";
                }elseif ($vendredi == 2) {
                    $vendredi = "Pad thai au poulet";
                }else {
                    $vendrediErr = "Au moin un choix de repas doit être fait au Vendredi.";
                }

                if (empty($prenomParentErr) && empty($nomParentErr) && empty($prenomEnfantErr) && empty($nomEnfantErr) && empty($ageErr)
                && empty($ecoleErr) && empty($lundiErr) && empty($mardiErr) && empty($mercrediErr) && empty($jeudiErr) && empty($vendrediErr)) {
                    header("Location: confirmation.php", true, 303);
                    $myfile = fopen("infoCommande.txt", "a+") or die("unable to open file!");
                    $temp = "\n" . "Parent: " . $prenomParent . " " . $nomParent . ", Enfant: " . $prenomEnfant . " " . $nomEnfant .
                        ", Age: " . $age . ", Ecole: " . $ecole . ", Lundi: " . $lundi . ", Mardi: " . $mardi. ", Mercredi: " .
                        $mercredi. ", Jeudi: " . $jeudi . ", Vendredi: " . $vendredi . "\n";

                    fwrite($myfile, $temp);
                    fclose($myfile);
                    exit;
                }
            }

            ?>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <div class="section_commande" id="commande">
                <h3>COMMANDEZ VOS REPAS EN LIGNE</h3>
                <a href="commande.html">EN SAVOIR MENU</a>
                <h5>Les champs marqués d'un * sont obligatoires</h5>
                <div>
                    <label for="prenom_parent">Prénom du parent*</label>&nbsp;&nbsp;
                    <input type="text" name="prenomParent"  id="prenom_parent" size="30"/>
                    <span class="error" style="color: red; font-size: 18px;"> <?php if (!empty($prenomParentErr)) {
                            echo $prenomParentErr;
                        } ?></span>
                </div><br>
                <div>
                    <label for="nom_parent">Nom du parent*</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" name="nomParent" id="nom_parent" size="30"/>
                    <span class="error" style="color: red; font-size: 18px;"> <?php if (!empty($nomParentErr)) {
                            echo $nomParentErr;
                        } ?></span>
                </div><br>
                <div>
                    <label for="prenom_enfant">Prénom de l'enfant*</label>
                    <input type="text" name="prenomEnfant" id="prenom_enfant" size="30"/>
                    <span class="error" style="color: red; font-size: 18px;"> <?php if (!empty($prenomEnfantErr)) {
                            echo $prenomEnfantErr;
                        } ?></span>
                </div><br>
                <div>
                    <label for="nom_enfant">Nom de l'enfant*</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" name="nomEnfant" id="nom_enfant" size="30"/>
                    <span class="error" style="color: red; font-size: 18px;"> <?php if (!empty($nomEnfantErr)) {
                            echo $nomEnfantErr;
                        } ?></span>
                </div><br>
                <div>
                    <label for="ecole">École de l'enfant*</label>&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" name="ecole" id="ecole" size="30"/>
                    <span class="error" style="color: red; font-size: 18px;"> <?php if (!empty($ecoleErr)) {
                            echo $ecoleErr;
                        } ?></span>
                </div><br>
                <div>
                    <label for="age">Âge de l'enfant*</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" name="age" id="age" size="30"/>
                    <span class="error" style="color: red; font-size: 18px;"> <?php if (!empty($ageErr)) {
                            echo $ageErr;
                        } ?></span>
                </div>
                <div>
                    <p>Choisissez vos repas de Lundi à Vendredi</p>
                    <label for="lundi">LUNDI*</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <select name="lundi" id="lundi">
                        <option value=" ">&nbsp;</option>
                        <option value= "1" >1. Poulet Général Tao</option>
                        <option value= "2" >2. Paté Chinois</option>
                    </select>
                    <span class="error" style="color: red; font-size: 18px;"> <?php if (!empty($lundiErr)) {
                            echo $lundiErr;
                        } ?></span>
                    <br><br>
                    <label for="mardi">MARDI*</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <select name="mardi" id="mardi">
                        <option value=" ">&nbsp;</option>
                        <option value="1">1. Macaroni Fromage</option>
                        <option value="2">2. Hamburger</option>
                    </select>
                    <span class="error" style="color: red; font-size: 18px;"> <?php if (!empty($mardiErr)) {
                            echo $mardiErr;
                        } ?></span>
                    <br><br>
                    <label for="mercredi">MERCREDI*</label>
                    <select name="mercredi" id="mercredi">
                        <option value=" ">&nbsp;</option>
                        <option value="1">1. Spaghetti</option>
                        <option value="2">2. Lasagne</option>
                    </select>
                    <span class="error" style="color: red; font-size: 18px;"> <?php if (!empty($mercrediErr)) {
                            echo $mercrediErr;
                        } ?></span>
                    <br><br>
                    <label for="jeudi">JEUDI*</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <select name="jeudi" id="jeudi">
                        <option value=" ">&nbsp;</option>
                        <option value="1">1. Pennine Sauce Viande</option>
                        <option value="2">2. Pizza Tomate Fromage</option>
                    </select>
                    <span class="error" style="color: red; font-size: 18px;"> <?php if (!empty($jeudiErr)) {
                            echo $jeudiErr;
                        } ?></span>
                    <br><br>
                    <label for="vendredi">VENDREDI*</label>
                    <select name="vendredi" id="vendredi">
                        <option value=" ">&nbsp;</option>
                        <option value="1">1. Pilaf au Saumon</option>
                        <option value="2">2. Pad Thai au Poulet</option>
                    </select>
                    <span class="error" style="color: red; font-size: 18px;"> <?php if (!empty($vendrediErr)) {
                            echo $vendrediErr;
                        } ?></span>
                    <br><br>
                </div>
                <div>
                    <input type="submit" id="submit" value="Soumettre"><br><br>
                </div>
                <div class="menu1" id="menu1">
                    <img src="css/img/tao.jpg" alt="general tao">
                    <img src="css/img/chinois.jpg" alt="pate chinois">
                    <img src="css/img/macaroni.jpg" alt="macaroni">
                    <img src="css/img/hamburger.jpg" alt="hamburger">
                    <img src="css/img/spaghetti.jpg" alt="spaghetti"><br><br>
                </div>
                <div class="menu2" id="menu2">
                    <img src="css/img/lasagne.jpg" alt="Lasagne">
                    <img src="css/img/penne.jpg" alt="penne">
                    <img src="css/img/pizza.jpg" alt="pizza">
                    <img src="css/img/saumon.jpg" alt="saumon">
                    <img src="css/img/padThai.jpg" alt="padThai">
                </div>
            </div>
            </form><br>

            <div class="section_info" id="info">
                <h3>NOTRE SERVICE</h3>
                <a href="information.html" id="plus">EN SAVOIR PLUS</a><br>
                <ul>
                    <li>Notre qualité alimentaire</li>
                    <li>Excellent rapport qualité prix</li>
                    <li>Fournir deux options de service</li>
                    <li>Fournir des repas sains, nutritifs et équilibrés conformément à la politique </li>
                    <li>Servir des repas chauds à l'école</li>
                    <li>Des menus différents chaque jour</li>
                    <li>Sécurité alimentaire</li>
                    <li>Rechercher et développer de nouveaux produits de santé</li>
                    <li>Commandez et payez en ligne rapidement et facilement</li>
                    <li>Peut être annulé le même jour (avant 7h)</li>

                </ul>
            </div>
            <hr>
            <div class="section_contact" id="contact">
                <h3>NOUS JOINDRE</h3>
                <a href="contact.html" id="retour">EN SAVOIR PLUS</a><br>
                <div class="contact_list">
                <ol class="contact_list">
                    <li>
                        <div class="contact_element">
                            PHONES<br/>
                            <br/>
                            <a href="tel:(514)639-2859">Téléphone: (514)639-2859</a>
                            <a href="fax:(514)349-5588">Télécopieur: (514)349-5588</a>
                        </div>
                    </li>
                    <li>
                        <div class="contact_element">
                            CONTACT<br/>
                            <br>
                            <a href="mailto:service@repasain.com">service@repasain.com</a>
                            <a href="mailto:commande@repasain.com">commande@repasain.com</a>
                        </div>
                    </li>
                    <li>
                        <div class="contact_element">
                            ADRESSE<br/>
                            <br/>
                            9187 Boulevard de l'Acadie<br/>
                            Montréal, QC(H4N 3K1)
                        </div>
                    </li>
                    <li>
                        <div class="contact_element">
                            HEURES D'OUVERTURE<br/>
                            <br/>
                            Lun.-Ven.: 9:00-17:00<br/>
                            Fin de la semaine: Fermé
                        </div>
                    </li>
                </ol>
                </div>
                <iframe width="1200" height="600" style="border: 0"
                        src="http://www.google.cn/maps/embed?pb=!1m18!1m12!1m3!1d2794.8555715352!2d-73.65737498447716!3d45.53311187910181!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cc918f753efe62f%3A0x8f890593e99e84dc!2zOTE4NyBCb3VsZXZhcmQgZGUgbCdBY2FkaWUsIE1vbnRyw6lhbCwgUUMgSDROIDNLMeWKoOaLv-Wkpw!5e0!3m2!1szh-CN!2scn!4v1541397002652">
                </iframe>
            </div>
            <hr>

            <div class="section_foot">
                <footer>
                    <div class="top_foot">
                        <div class="quick_link">
                        <ul>
                            <li><a href="accueil.html">Accueil</a></li>
                            <li><a href="information.html">Information</a></li>
                            <li><a href="commande.html">Commande</a></li>
                            <li><a href="contact.html">Contact</a></li>
                            <li><a href="faq.html">FAQ</a></li>
                        </ul>
                        </div>
                    </div>
                </footer>
                <div class="top_foot">
                    <p>
                        © 2018 RepaSain Ltd. Tous droits réservés.
                    </p>
                </div>
            </div>
        </body>
    </html>
