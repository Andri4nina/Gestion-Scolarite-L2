<?php
require_once("../../controller/connectDB.php");
if (isset($_POST["modifstudent"])) {
    $id_etu = $_POST['id_etu'];
    $nom_etu = $_POST['modif_nom_etu'];
    $prenom_etu = $_POST['modif_prenom_etu'];
    $date_naissance_etu = $_POST['modif_date_naissance_etu'];
    $sexe_etu = $_POST['modifsexe'];
    $adresse_etu = $_POST['modif_adresse_etu'];
    $email_etu = $_POST['modif_email_etu'];
    $tel_etu = $_POST['modif_tel_etu'];

    if (isset($nom_etu) && isset($prenom_etu) && isset($date_naissance_etu) && isset($sexe_etu) && isset($adresse_etu) && isset($email_etu) && isset($tel_etu)) {
        if ($nom_etu !== "" && $prenom_etu !== "" && $date_naissance_etu !== "" && $sexe_etu !== "" && $adresse_etu !== "" && $email_etu !== "" && $tel_etu !== "") {
            $db->exec("UPDATE `etudiant` SET `nom_etu`='$nom_etu', `prenom_etu`='$prenom_etu', `adresse_etu`='$adresse_etu', `email_etu`='$email_etu', `tel_etu`='$tel_etu', `date_naiss_etu`='$date_naissance_etu', `sexe_etu`='$sexe_etu' WHERE `id_etu`='$id_etu'");
            //echo "Modification effectuée";
            header("Location: Main.php"); // Redirection vers la page d'accueil
            exit;
        } else {
            echo "<br> Un des champs est vide !!";
        }
    }

    // Fermeture de la base de données
    $db = null;
}



if (isset($_POST["modiflaststudent"])) {
    $id_etu = $_POST['idlast_etu'];
    $nom_etu = $_POST['modiflast_nom_etu'];
    $prenom_etu = $_POST['modiflast_prenom_etu'];
    $date_naissance_etu = $_POST['modiflast_date_naissance_etu'];
    $sexe_etu = $_POST['modifisexe'];
    $adresse_etu = $_POST['modiflast_adresse_etu'];
    $email_etu = $_POST['modiflast_email_etu'];
    $tel_etu = $_POST['modiflast_tel_etu'];

    if (isset($nom_etu) && isset($prenom_etu) && isset($date_naissance_etu) && isset($sexe_etu) && isset($adresse_etu) && isset($email_etu) && isset($tel_etu)) {
        if ($nom_etu !== "" && $prenom_etu !== "" && $date_naissance_etu !== "" && $sexe_etu !== "" && $adresse_etu !== "" && $email_etu !== "" && $tel_etu !== "") {
            $db->exec("UPDATE `etudiant` SET `nom_etu`='$nom_etu', `prenom_etu`='$prenom_etu', `adresse_etu`='$adresse_etu', `email_etu`='$email_etu', `tel_etu`='$tel_etu', `date_naiss_etu`='$date_naissance_etu', `sexe_etu`='$sexe_etu' WHERE `id_etu`='$id_etu'");
            //echo "Modification effectuée";
            header("Location: Main.php");  // Redirection vers la page d'accueil
            exit;
        } else {
            echo "<br> Un des champs est vide !!";
        }
    }

    // Fermeture de la base de données
    $db = null;
}
 



?>