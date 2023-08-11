<?php include_once("include/connexion.php");

session_start();

$video = $connexion->selectVideoUtilisateurCategorieTag($_POST["ID_Video"]); 
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $video[0]["titre"] ?></title>
    <link rel="shortcut icon" href="image/tv-media-logo-design.-video-cam-sign.-png_109082.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    
    <?php include("include/header.php"); ?>
    
    <main>

    <?php
     echo '   
        <secteur class="boiteLecteur">
            <div class="lecteurVideo">
                <video src="'.$video[0]["lien"].'" class="lecteurVideoContainer" controls></video>
                <h2>'.$video[0]["titre"].'</h2>
                <div class="textCarteVideo">
                    <p>'.$video[0]["pseudo"].'</p>
                    <p>'.$video[0]["duree"].'</p>
                </div>
                <p>'.$video[0]["publication"].'</p>
                <h4>Description</h4>
                <p>'.$video[0]["description"].'</p>
            </div>';

            ?>
            <div class="lecteurCategorieTag">
                <h4>Categorie de la video</h4>
                <div class="lecteurCategorie">
                <?php
                foreach ($video as $uneLigne){
                    echo '
                    <form action="module\selectionCategorie.php" method="POST">
                            <input type="hidden" value="'.$uneLigne['ID_Categorie'].'" name="rechercheCategorie">
                            <button class="boutonRecherche" type="submit">'.$uneLigne['categorie'].'</button>
                        </form>';}
                ?>
                </div>

                
                <h4>Tag de la video</h4>
                
                <div class="lecteurCategorie">
               
                <?php
                foreach ($video as $uneLigne){
                    echo '
                    <form action="module\selectionCategorie.php" method="POST">
                            <input type="hidden" value="'.$uneLigne['ID_Tag'].'" name="rechercheCategorie">
                            <button class="boutonRecherche" type="submit">'.$uneLigne['tag'].'</button>
                        </form>';
                }
                ?>
                </div>

            </div>
        </secteur>



    </main>

    <?php include("include/footer.php"); ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>

</html>