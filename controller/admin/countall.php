<?php 
require_once("../../controller/connectDB.php");

//solde
$countsolde=$db->prepare("SELECT SUM(montant_paye) FROM `paiement`"); 
$countsolde->execute();
$solde = $countsolde->fetchColumn();

//sodle reste
$countsolderest=$db->prepare("SELECT SUM(reste_a_payer) FROM `paiement`"); 
$countsolderest->execute();
$solderest = $countsolderest->fetchColumn();

//compte etudiant
$countstudent=$db->prepare("SELECT count(id_etu) FROM `etudiant`"); 
$countstudent->execute();
$nb_etudiants = $countstudent->fetchColumn();

//compte etudiant payer
$countstudentpaye=$db->prepare("SELECT count(id_etu) FROM `etudiant` where `statut_paiement_etu`='paye'"); 
$countstudentpaye->execute();
$nb_etudiantspaye = $countstudentpaye->fetchColumn();

//compte etutiant impayer
$countstudentimpaye=$db->prepare("SELECT count(id_etu) FROM `etudiant` where `statut_paiement_etu`!='paye'"); 
$countstudentimpaye->execute();
$nb_etudiantsimpaye = $countstudentimpaye->fetchColumn();

//pourcentage payer par rapport au payer

// Vérifier si le nombre total d'étudiants est différent de zéro
if ($nb_etudiants != 0) {
  $payepourcent = $nb_etudiantspaye * 100 / $nb_etudiants;
} else {
  $payepourcent = 0; 
}

if ($nb_etudiants != 0) {
  $impayepourcent = $nb_etudiantsimpaye * 100 / $nb_etudiants;
} else {
  $impayepourcent = 0;
}

//compte de nombre de graçon et fille dans DA2I 
$countmaleDA2I=$db->prepare("SELECT COUNT(id_etu) FROM `etudiant` WHERE `parcours_etu`='DA2I' AND `sexe_etu` ='homme'"); 
$countmaleDA2I->execute();
$nb_etudiantsmaleDA2I = $countmaleDA2I->fetchColumn();
$countfemaleDA2I=$db->prepare("SELECT COUNT(id_etu) FROM `etudiant` WHERE `parcours_etu`='DA2I' AND `sexe_etu` ='femme'"); 
$countfemaleDA2I->execute();
$nb_etudiantsfemaleDA2I = $countfemaleDA2I->fetchColumn();

//compte de nombre de graçon et fille dans RPM 
$countmaleRPM=$db->prepare("SELECT COUNT(id_etu) FROM `etudiant` WHERE `parcours_etu`='RPM' AND `sexe_etu` ='homme'"); 
$countmaleRPM->execute();
$nb_etudiantsmaleRPM = $countmaleRPM->fetchColumn();
$countfemaleRPM=$db->prepare("SELECT COUNT(id_etu) FROM `etudiant` WHERE `parcours_etu`='RPM' AND `sexe_etu` ='femme'"); 
$countfemaleRPM->execute();
$nb_etudiantsfemaleRPM = $countfemaleRPM->fetchColumn();

//compte de nombre de graçon et fille dans AES 
$countmaleAES=$db->prepare("SELECT COUNT(id_etu) FROM `etudiant` WHERE `parcours_etu`='AES' AND `sexe_etu` ='homme'"); 
$countmaleAES->execute();
$nb_etudiantsmaleAES = $countmaleAES->fetchColumn();
$countfemaleAES=$db->prepare("SELECT COUNT(id_etu) FROM `etudiant` WHERE `parcours_etu`='AES' AND `sexe_etu` ='femme'"); 
$countfemaleAES->execute();
$nb_etudiantsfemaleAES = $countfemaleAES->fetchColumn();




?>