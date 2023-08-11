<?php
session_start();
include ("../include/connexion.php");

if ($_POST['mdp'] == $_POST['v_mdp']) {
    $password = $_POST['mdp'];
};





$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$connexionbdd = new MaConnexion ("plateform_streaming","","root","localhost");



$connexionbdd->insertionUtilisateur($_POST['nom'],$_POST['prenom'],$_POST['pseudo'], $_POST['email'],$hashedPassword,$_POST['role']);


header("Location:../index.php");


?>