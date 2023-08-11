<?php
session_start();

include("../include/connexion.php");
$selection = new MaConnexion("plateform_streaming", "", "root", "localhost");
// $test = $selection->select('utilisateur');
// var_dump($test);



$select = $selection->selectUtilisateur($_POST['email']);
    

 
    if (!empty($select)) {
        echo " une correspondance à été trouvée ";
        if (password_verify($_POST['mdp'], $select[0]["mdp"])){
            
            $_SESSION["pseudoUser"]=$select[0]["pseudo"];
            $_SESSION["nomUser"]=$select[0]["nom"];
            $_SESSION["prenomUser"]=$select[0]["prenom"];
            $_SESSION["ID_Utilisateur"]=$select[0]["ID_Utilisateur"];
            $_SESSION["Role"]=$select[0]["role"];
            
            echo "its ok";
        } else{
            echo " nop en fait";
        }

};
 
 
 header("Location: ../index.php");
?>