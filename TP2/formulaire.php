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

        if($nomParent == "") {
            $erreur = $erreur . "Le champ 'Nom du parent' est obligatoire.<br/>";
        }elseif(count(explode($virgule, $nomParent))>1){
            $erreur = $erreur . "Les virgules ne sont pas permises dans le champ 'Nom du parent'.<br/>";
        }

        if($prenomParent == "") {
            $erreur = $erreur . "Le champ 'Prénom du parent' est obligatoire.<br/>";
        }elseif(count(explode($virgule, $prenomParent))>1){
            $erreur = $erreur . "Les virgules ne sont pas permises dans le champ 'Prénom du parent'.<br/>";
        }

        if($nomEnfant == "") {
            $erreur = $erreur . "Le champ 'Nom de l'enfant' est obligatoire.<br/>";
        }elseif(count(explode($virgule, $nomEnfant))>1){
            $erreur = $erreur . "Les virgules ne sont pas permises dans le champ 'Nom de l'enfant'.<br/>";
        }

        if($prenomEnfant == "") {
            $erreur = $erreur . "Le champ 'Prénom de l'enfant' est obligatoire.<br/>";
        }elseif(count(explode($virgule, $prenomEnfant))>1){
            $erreur = $erreur . "Les virgules ne sont pas permises dans le champ 'Prénom de l'enfant'.<br/>";
        }

        if($ecole == "") {
            $erreur = $erreur . "Le champ 'École' est obligatoire.<br/>";
        }elseif(count(explode($virgule, $ecole))>1){
            $erreur = $erreur . "Les virgules ne sont pas permises dans le champ 'École'.<br/>";
        }

        if($age == "") {
            $erreur = $erreur . "Le champ 'Âge' est obligatoire.<br/>";
        }elseif($age < 4 || $age > 12) {
            $erreur = $erreur . "Le champ 'Âge' doit être un entier positif entre 4 et 12 inclusivement.<br/>";
        }
        
        if($lundi == 1) {
            $lundi = "Poulet general tao";
        }elseif ($lundi == 2) {
            $lundi = "Pate Chinois";
        }else {
            $erreur = $erreur . "Au moin un choix de repas doit être fait au Lundi.<br/>";
        }

        if($mardi == 1) {
            $mardi = "Macaroni fromage";
        }elseif ($mardi == 2) {
            $mardi = "Hamburger";
        }else {
            $erreur = $erreur . "Au moin un choix de repas doit être fait au Mardi.<br/>";
        }

        if($mercredi == 1) {
            $mercredi = "Spaghetti";
        }elseif ($mercredi == 2) {
            $mercredi = "Lasagne";
        }else {
            $erreur = $erreur . "Au moin un choix de repas doit être fait au mercredi.<br/>";
        }

        if($jeudi == 1) {
            $jeudi = "Pennine sauce viande";
        }elseif ($jeudi == 2) {
            $jeudi = "Pizza tamate fromage";
        }else {
            $erreur = $erreur . "Au moin un choix de repas doit être fait au jeudi.<br/>";
        }

        if($vendredi == 1) {
            $vendredi = "Pilaf au saumon";
        }elseif ($vendredi == 2) {
            $vendredi = "Pad thai au poulet";
        }else {
            $erreur = $erreur . "Au moin un choix de repas doit être fait au Vendredi.<br/>";
        }
        
        if ($erreur == "") {
            header("Location: confirmation.php", true, 303);
            $myfile = fopen("infoCommande.txt", "a+") or die("unable to open file!");
            $temp = "\n" . "Parent: " . $prenomParent . " " . $nomParent . ", Enfant: " . $prenomEnfant . " " . $nomEnfant .
                ", Age: " . $age . ", Ecole: " . $ecole . ", Lundi: " . $lundi . ", Mardi: " . $mardi. ", Mercredi: " .
                $mercredi. ", Jeudi: " . $jeudi . ", Vendredi: " . $vendredi . "\n";

            fwrite($myfile, $temp);
            fclose($myfile);
            exit;
        }else {
            echo "<h3 style='color: red'>{$erreur}</h3>";
        }

    }

?>