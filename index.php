<?php include_once("include/connexion.php");
$video = $connexion->selectVideoUtilisateur(); 
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page d'accueil</title>
    <link rel="shortcut icon" href="image/tv-media-logo-design.-video-cam-sign.-png_109082.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php include("include/header.php"); ?>

    <main>
        <h1 >NOS VIDEOS</h1>
        <section class="boite">

     <?php       
        foreach ($video as $uneLigne) {
        echo '
            <form action="lecteur.php" method="POST">
                <div class="carteVideo">
                    <button class="videoBouton">
                        <video src="'.$uneLigne['lien'].'" class="videoContainer" muted></video>
                    </button>
                    <h4>'.$uneLigne['titre'].'</h4>
                    <div class="textCarteVideo">
                        <p>'.$uneLigne['pseudo'].'</p>
                        <p>'.$uneLigne['duree'].'</p>
                    </div>
                </div>
                <input type="hidden" name="ID_Video" value="'.$uneLigne['ID_Video'].'">
            </form>';
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