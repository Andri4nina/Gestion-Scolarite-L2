<?php
@session_start();
require_once("../../controller/connectDB.php");
if(isset($_POST["connectbtn"])){
    if(!empty($_POST["nomuser"])  && !empty($_POST["mailuser"]) && !empty($_POST["mdpuser"])){  
        $admin=htmlspecialchars($_POST["nomuser"]);
        $mail=htmlspecialchars($_POST["mailuser"]);
        $mdp=htmlspecialchars($_POST["mdpuser"]);
        $select=$db->prepare('SELECT * FROM user WHERE username=? and passworduser=? and email=?' );
        $select->execute(array($admin,$mdp,$mail));
        if ($select->rowCount()>0) {
           /*  $_SESSION['auth']=true;  */
            $_SESSION['username']=$admin;
            $_SESSION['email']=$mail;
            $_SESSION['passworduser']=$mdp;
            $_SESSION['id']=$select-> fetch()['id'];
            header('Location: index.php');
            exit();
        }
        else{
            $err = "Le nom d'utilisateur ou le mot de passe est incorrect.";
            echo $err;
        }
    }
    else
    {
        echo'remplir le formulaire';
    }
} 

?>