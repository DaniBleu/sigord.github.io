<?php 
    try {
        session_start();
        $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8;', 'root',  '');
    } catch (Exception $e) {

        die('Une erreur a ete trouvée : ' . $e->getMessage());
    }
    if(isset($_POST['submit'])){
        // Récupérer les données du formulaire
        $Adresse = $_POST['adresse'];
        $password = $_POST['password0'];
        
        //
        $verif=$bdd->prepare('SELECT adresse FROM face WHERE adresse = ?');
        $verif->execute(array($nom));		
        $insert = $bdd->prepare('INSERT INTO infos(adresse, password0) VALUES(?, ?)');
        $insert->execute(array($adresse, $password));
    }
