<?php include_once("include/connexion.php");
session_start();
$categorie = $connexion->selectCategorie();
$tag = $connexion->selectTag();

//$recherche = $connexion->selectVideoCategorieID($_POST['ID_Categorie']);
?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Recherche</title>
    <link rel="shortcut icon" href="image/tv-media-logo-design.-video-cam-sign.-png_109082.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php include("include/header.php"); ?>

    <main>


        <section class="petiteBoite">

            <!-- Composant bootstrap qui utilise du JavaScript pour faire apparaitre une fenetre en cliquant sur un bouton -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#categorie-tab-pane" type="button" role="tab" aria-controls="categorie-tab-pane" aria-selected="true">Catégories</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#tag-tab-pane" type="button" role="tab" aria-controls="tag-tab-pane" aria-selected="false">Tag</button>
                </li>

            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="categorie-tab-pane" role="tabpanel" aria-labelledby="categorie-tab" tabindex="0">
                    
                    <div class="listeRecherche">

                        <?php
                        foreach ($categorie as $uneLigne) {
                            echo '
                        <form action="module\selectionCategorie.php" method="POST">
                            <input type="hidden" value="' . $uneLigne['ID_Categorie'] . '" name="rechercheCategorie">
                            <button class="boutonRecherche" type="submit">' . $uneLigne['categorie'] . '</button>
                        </form>';
                        }
                        ?>

                    </div>
                </div>

                <div class="tab-pane fade" id="tag-tab-pane" role="tabpanel" aria-labelledby="tag-tab" tabindex="0">

                    <div class="listeRecherche">

                        <?php
                        foreach ($tag as $uneLigne) {
                            echo '
                        <form action="module\selectionCategorie.php" method="POST">
                            <input type="hidden" value="' . $uneLigne['ID_Tag'] . '" name="rechercheTag">
                            <button class="boutonRecherche" type="submit">' . $uneLigne['tag'] . '</button>
                        </form>';
                        }
                        ?>
                    </div>
                </div>
            
            </div>
        </section>

        <?php

switch (true) {

    case !isset($_SESSION["rechercheCategorie"]) && !isset($_SESSION["rechercheTag"]):
        echo '<h1>Veuillez selectionner un critere de recherche</h1>';
        break;

    case (!empty($_SESSION["rechercheCategorie"])):
        $rechercheCategorie = $connexion->selectVideoCategorieID($_SESSION["rechercheCategorie"]);
        echo '
        <h1>Recherche dans la categorie : '.$rechercheCategorie[0]["categorie"].' </h1>

        <section class="boite">';
            
        foreach ($rechercheCategorie as $uneLigne) {
        echo '
            <form action="lecteur.php" method="POST">
                <div class="carteVideo">
                    <button class="videoBouton">
                        <video src="'.$uneLigne['lien'].'" class="videoContainer" muted></video>
                    </button>
                    <h4>'.$uneLigne['titre'].'</h4>
                    <div class="textCarteVideo">
                        <p>'.$uneLigne['duree'].'</p>
                    </div>
                </div>
                <input type="hidden" name="ID_Video" value="'.$uneLigne['ID_Video'].'">
            </form>';
        };
        
        
        break;

    case (!empty($_SESSION["rechercheTag"])):
        
        $rechercheTag = $connexion->selectVideoTagID($_SESSION["rechercheTag"]);
        echo '
        <h1>Recherche dans le tag : '.$rechercheTag[0]["tag"].' </h1>

        <section class="boite">';
            
        foreach ($rechercheTag as $uneLigne) {
        echo '
            <form action="lecteur.php" method="POST">
                <div class="carteVideo">
                    <button class="videoBouton">
                        <video src="'.$uneLigne['lien'].'" class="videoContainer" muted></video>
                    </button>
                    <h4>'.$uneLigne['titre'].'</h4>
                    <div class="textCarteVideo">
                        <p>'.$uneLigne['duree'].'</p>
                    </div>
                </div>
                <input type="hidden" name="ID_Video" value="'.$uneLigne['ID_Video'].'">
            </form>';
        };
        break;
    default:
    echo '<h1>Veuillez selectionner un critere de recherche</h1>';
        break;
}
        
        ?>
    
        </section>

    </main>

    <?php include("include/footer.php"); ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>

</html>