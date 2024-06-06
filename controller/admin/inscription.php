<?php
require_once("../../controller/connectDB.php");

if (isset($_POST["inscriptionbtn"])) {

 $photo = $_FILES["photo_etu"]["name"];
    $nom_etu = $_POST['nom_etu'];
    $prenom_etu = $_POST['prenom_etu'];
    $date_naissance_etu = $_POST['date_naissance_etu'];
    $sexe_etu = $_POST['sexe_etu'];
    $adresse_etu = $_POST['adresse_etu'];
    
    $email_etu = $_POST['email_etu'];
    $tel_etu = $_POST['tel_etu'];
    $parcours_etu = $_POST['parcours_etu'];
    $niveau_etu = $_POST['niveau_etu'];

    $date_paiement = $_POST['date_paiement'];
    $type_paiement = $_POST['type_paiement'];

    $montant_paye = $_POST['montant_paye'];
    $date_inscription_etu = $_POST['date_inscription_etu'];

    $reste_a_payer = $_POST['reste_a_payer'];
    $date_limite_paiement = $_POST['date_limite_paiement'];

    $statut_paiement_etu = $_POST['statut_paiement_etu'];

  


    $selectetu = $db->prepare('SELECT * FROM `etudiant` WHERE nom_etu=:nom_etu AND prenom_etu=:prenom_etu AND date_naiss_etu=:date_naissance_etu AND sexe_etu=:sexe_etu AND adresse_etu=:adresse_etu AND email_etu=:email_etu AND tel_etu=:tel_etu AND niveau_etu=:niveau_etu AND parcours_etu=:parcours_etu AND date_inscription_etu=:date_inscription_etu AND statut_paiement_etu=:statut_paiement_etu');


    $selectetu->execute(array(
        ':nom_etu' => $nom_etu,
        ':prenom_etu' => $prenom_etu,
        ':adresse_etu' => $adresse_etu,
        ':email_etu' => $email_etu,
        ':tel_etu' => $tel_etu,
        ':date_naissance_etu' => $date_naissance_etu,
        ':parcours_etu' => $parcours_etu,
        ':niveau_etu' => $niveau_etu,
        ':date_inscription_etu' => $date_inscription_etu,
        ':statut_paiement_etu' => $statut_paiement_etu,
        ':sexe_etu' => $sexe_etu
    ));

    if (!empty($_POST["nom_etu"]) && !empty($_POST["prenom_etu"]) && !empty($_POST["adresse_etu"]) &&
        !empty($_POST["email_etu"]) && !empty($_POST["tel_etu"]) && !empty($_POST["parcours_etu"]) &&
        !empty($_POST["niveau_etu"]) && !empty($_POST["date_inscription_etu"]) && !empty($_POST["statut_paiement_etu"]) && !empty($_POST['date_limite_paiement']) &&
        !empty($_POST['type_paiement']) && !empty($_POST['montant_paye']) && !empty($_POST['date_paiement'])) {

        if ($selectetu->fetch()) {
            $error = "Cet étudiant existe déjà";
            echo $error;
        } else {
            // Requête d'insertion pour l'étudiant
            $addetu = $db->prepare("INSERT INTO `etudiant` (`nom_etu`, `prenom_etu`, `adresse_etu`, `email_etu`, `tel_etu`, `parcours_etu`, `niveau_etu`, `date_inscription_etu`, `statut_paiement_etu`, `sexe_etu`, `photo_etu`, `date_naiss_etu`) VALUES (:nom_etu, :prenom_etu, :adresse_etu, :email_etu, :tel_etu, :parcours_etu, :niveau_etu, :date_inscription_etu, :statut_paiement_etu, :sexe_etu, :photo_etu, :date_naiss_etu)");

            
               $addetu->execute(array(
               ':nom_etu' => $nom_etu,
    ':prenom_etu' => $prenom_etu,
    ':adresse_etu' => $adresse_etu,
    ':email_etu' => $email_etu,
    ':tel_etu' => $tel_etu,
    ':parcours_etu' => $parcours_etu,
    ':niveau_etu' => $niveau_etu,
    ':date_inscription_etu' => $date_inscription_etu,
    ':statut_paiement_etu' => $statut_paiement_etu,
    ':sexe_etu' => $sexe_etu,
    ':photo_etu' => $photo,
    ':date_naiss_etu' => $date_naissance_etu
));

            

            $id_etu = $db->lastInsertId();

            // Requête d'insertion pour le paiement
            $addpaye = $db->prepare("INSERT INTO `paiement` (`id_etu`, `montant_paye`, `date_paiement`, `type_paiement`, `reste_a_payer`, `date_limite_paiement`) 
                    VALUES (:id_etu, :montant_paye, :date_paiement, :type_paiement, :reste_a_payer, :date_limite_paiement)");

            $addpaye->execute(array(
                ':id_etu' => $id_etu,
                ':montant_paye' => $montant_paye,
                ':date_paiement' => $date_paiement,
                ':type_paiement' => $type_paiement,
                ':reste_a_payer' => $reste_a_payer,
                ':date_limite_paiement' => $date_limite_paiement
            ));

            header("Location: index.php"); // Redirection vers la page d'accueil 
            exit;
        }
    } else {
        echo "Remplissez le formulaire";
    }

    // Fermeture de la base de données
    $db = null;
}
?>