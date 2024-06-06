<?php

require_once("../../controller/connectDB.php");

if (isset($_POST["Supprimer_etu"])) {
    // Récupération des données
    $id_etu = $_POST['id_etu'];

    // Suppression dans la base de données
    $db->exec("DELETE FROM `etudiant` WHERE id_etu='$id_etu'");

    // Fermeture de la base de données
    $db = null;

    // Redirection vers la page d'accueil
    header("Location: index.php");
    exit;
}

if (isset($_POST["Supprimerlast_etu"])) {
    // Récupération des données
    $id_etu = $_POST['idlast_etu'];

    // Suppression dans la base de données
    $db->exec("DELETE FROM `etudiant` WHERE id_etu='$id_etu'");

    // Fermeture de la base de données
    $db = null;

    // Redirection vers la page d'accueil
    header("Location: index.php");
    exit;
}

?>