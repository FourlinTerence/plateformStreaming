<header>
    <nav>
        <div class="lienNav">
            <a href="index.php"><img class="logo" src="image/tv-media-logo-design.-video-cam-sign.-png_109082.jpg" alt=""></a>
            <p><a href="recherche.php" class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover policeLienNav">Recherche</a></p>
        </div>
        <div class="connexionNav">

            <?php
            switch (true) {
                case empty($_SESSION["ID_Utilisateur"]):

                    echo '            <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#inscription">Inscription</button>
            
                    <button type="button" class="btn btn-primary btn-lg ms-2" data-bs-toggle="modal" data-bs-target="#connexion">Connexion</button>
                
                    ';
                    break;

                case (!empty($_SESSION["ID_Utilisateur"])):
                    echo '
                    <div class="btn-group">
                    <form action="espacePerso.php" method="POST">
                        <button class="btn btn-secondary btn-lg" type="submit">
                            Espace personnel
                        </button>
                        <input type="hidden" name="ID_Utilisateur" id="" value="$_SESSION["ID_Utilisateur"]">
                    </form>
                    <button type="button" class="btn btn-lg btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu">
                        <p>' . $_SESSION["nomUser"] . ' ' . $_SESSION["prenomUser"] . '</p>
                        <a href="module\sessionUnset.php">Déconnexion</a>
                        <button class="boutonRecherche" type="btn" data-bs-toggle="modal" data-bs-target="#modalUploadVideo">Uploader une video</button>
                    </ul>
                </div>
                    </div>';
                    break;
            }
            ?>




        </div>
    </nav>


    <!-- Modal d'inscription-->
    <form action="module\insertionUtilisateur.php" method="post">
        <div class="modal fade" id="inscription" tabindex="-1" aria-labelledby="inscriptionLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="inscriptionLabel">Formulaire d'inscription</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <label for="inscriptionNom" class="form-label">Nom</label>
                        <input type="text" id="inscriptionNom" class="form-control" placeholder="Inscrivez votre nom" name="nom">

                        <label for="inscriptionPrenom" class="form-label">Prenom</label>
                        <input type="text" id="inscriptionPrenom" class="form-control" placeholder="Inscrivez votre prenom" name="prenom">

                        <label for="inscriptionPseudo" class="form-label">Pseudo</label>
                        <input type="text" id="inscriptionPseudo" class="form-control" placeholder="Inscrivez votre pseudo" name="pseudo">


                        <label for="inscriptionEmail" class="form-label">Adresse Email</label>
                        <input type="email" class="form-control" id="inscriptionEmail" placeholder="name@example.com" name="email">


                        <label for="inscriptionMotDePasse" class="form-label">Mot de passe</label>
                        <input type="password" id="inscriptionMotDePasse" class="form-control" name="mdp">

                        <label for="v_inscriptionMotDePasse" class="form-label">Veuillez confirmer votre mot de passe</label>
                        <input type="password" id="v_inscriptionMotDePasse" class="form-control" name="v_mdp">

                        <input type="hidden" value="Abonnee" name="role">

                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Confirmer</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>

                    </div>
                </div>

            </div>
        </div>
        </div>
    </form>

    <!-- Modal de connexion-->
    <form action="module\connexionUtilisateur.php" method="post">
        <div class="modal fade" id="connexion" tabindex="-1" aria-labelledby="connexionLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="connexionLabel">Si vous ne possedez pas de compte, veillez vous inscrire</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <label for="connexionEmail" class="form-label">Adresse Email</label>
                        <input type="email" class="form-control" id="connexionEmail" placeholder="name@example.com" name="email">


                        <label for="connexionMotDePasse" class="form-label">Mot de passe</label>
                        <input type="password" id="connexionMotDePasse" class="form-control" name="mdp">
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Confirmer</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>>
                    </div>
                </div>
            </div>
        </div>
    </form>
    
    <!-- Modal d'insersion de video -->
    <div class="modal fade" id="modalUploadVideo" tabindex="-1" aria-labelledby="modalUploadVideoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalUploadVideoLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</header>