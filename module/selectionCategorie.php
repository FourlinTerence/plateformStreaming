<?php include_once("../include/connexion.php");
session_start();

$_SESSION["rechercheCategorie"] = "";
$_SESSION["rechercheTag"] = "";

if(!empty($_POST["rechercheCategorie"])){

    $_SESSION["rechercheCategorie"] = $_POST["rechercheCategorie"];

}else{

    $_SESSION["rechercheTag"] = $_POST["rechercheTag"];
}

header("Location: ../recherche.php");
 
?>