<?php
require_once("../../controller/connectDB.php");


$takestudentlast=$db->prepare('SELECT * FROM etudiant
ORDER BY id_etu DESC
LIMIT 5;');
$executestudentlast = $takestudentlast->execute();
$studentlast = $takestudentlast->fetchAll();


$takestudent=$db->prepare('SELECT * FROM etudiant');
$executestudent = $takestudent->execute();
$student = $takestudent->fetchAll();


$takefrais=$db->prepare('SELECT * FROM `frais_scolarite`');
$executefrais = $takefrais->execute();
$fraissco = $takefrais->fetchAll();


$takepaiement=$db->prepare('SELECT * FROM `etudiant` JOIN paiement ON paiement.id_etu=etudiant.id_etu WHERE reste_a_payer !=0 ');
$executepaiement=$takepaiement->execute();
$paiement=$takepaiement->fetchAll();
?>