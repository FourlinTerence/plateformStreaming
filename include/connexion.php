<?php
class MaConnexion
{
    /*
    private $nomBaseDeDonnees = "";
    private $motDePasse = "";
    private $nomUtilisateur = "root";
    private $hote = "localhost";
    */
    private $nomBaseDeDonnees;
    private $motDePasse;
    private $nomUtilisateur;
    private $hote;
    private $connexionPDO;

    public function __construct($nomBaseDeDonnees, $motDePasse, $nomUtilisateur, $hote)
    {

        $this->nomBaseDeDonnees = $nomBaseDeDonnees;
        $this->motDePasse = $motDePasse;
        $this->nomUtilisateur = $nomUtilisateur;
        $this->hote = $hote;

        try {
            $dsn = "mysql:host=$this->hote;dbname=$this->nomBaseDeDonnees;charset=utf8mb4";
            $this->connexionPDO = new PDO($dsn, $this->nomUtilisateur, $this->motDePasse);
            $this->connexionPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return "Connexion reussi";
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

    //Fonction qui selectionne toute les données de la table video et retourne un json
    public function selectVideo_()
    {
        try {
            $requete = "SELECT * from video";
            $requete_preparee = $this->connexionPDO->query($requete);

            $requete_preparee->execute();
            $resultat = $requete_preparee->fetchAll(PDO::FETCH_ASSOC); //Recupere le resultat de la requete dans un tableau associatif

            echo json_encode($resultat);
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            return $e;
        }
    }

    //Fonction qui selectionne toute les données de la table categorie
    public function selectCategorie()
    {
        try {
            $requete = "SELECT * from categorie";
            $requete_preparee = $this->connexionPDO->query($requete);

            $requete_preparee->execute();
            $resultat = $requete_preparee->fetchAll(PDO::FETCH_ASSOC); //Recupere le resultat de la requete dans un tableau associatif

            $resultat = $requete_preparee->execute();
            $resultat = $requete_preparee->fetchAll(PDO::FETCH_ASSOC);
            return $resultat;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            return $e;
        }
    }

    //Fonction qui selectionne toute les données de la table categorie
    public function selectTag()
    {
        try {
            $requete = "SELECT * from tag";
            $requete_preparee = $this->connexionPDO->query($requete);

            $requete_preparee->execute();
            $resultat = $requete_preparee->fetchAll(PDO::FETCH_ASSOC); //Recupere le resultat de la requete dans un tableau associatif

            $resultat = $requete_preparee->execute();
            $resultat = $requete_preparee->fetchAll(PDO::FETCH_ASSOC);
            return $resultat;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            return $e;
        }
    }
    
    // Fonction qui selectionne toute les données de la table video et de la table utilisateur en mettant en rapport la clé secondaire ID_Utilisateur
    public function selectVideoUtilisateur()
    {
        try {
            $requete = "SELECT * FROM `video` 
                    INNER JOIN utilisateur ON utilisateur.ID_Utilisateur = video.ID_Utilisateur";


            $requete_preparee = $this->connexionPDO->prepare($requete);



            $resultat = $requete_preparee->execute();
            $resultat = $requete_preparee->fetchAll(PDO::FETCH_ASSOC);
            return $resultat;
        } catch (PDOException $error) {
            return "Erreur : " . $error->getMessage();
        }
    }
    
     // Fonction qui selectionne toute les données de la table video et de la table utilisateur en mettant en rapport la clé secondaire ID_Utilisateur
     public function selectVideoUtilisateuID($idUtilisateur)
     {
         try {
             $requete = "SELECT * FROM `video` 
                     INNER JOIN utilisateur ON utilisateur.ID_Utilisateur = video.ID_Utilisateur
                     WHERE video.ID_Utilisateur = ?";
 
 
             $requete_preparee = $this->connexionPDO->prepare($requete);
 
 
             $requete_preparee->bindValue(1, $idUtilisateur, PDO::PARAM_INT);

             $resultat = $requete_preparee->execute();
             $resultat = $requete_preparee->fetchAll(PDO::FETCH_ASSOC);
             return $resultat;
         } catch (PDOException $error) {
             return "Erreur : " . $error->getMessage();
         }
     }

    // Fonction qui selectionne toute les données de la table video et de la table utilisateur en mettant en rapport la clé secondaire ID_Utilisateur et renvoi un echo d un tableau en json
    public function selectVideoCategorieID($idCategorie)
    {
        try {
            $requete = "SELECT * FROM `categorie_video` 
                        INNER JOIN video ON video.ID_Video = categorie_video.ID_Video
                        INNER JOIN categorie ON categorie.ID_Categorie = categorie_video.ID_Categorie
                        where categorie_video.ID_Categorie = ?";
            

            $requete_preparee = $this->connexionPDO->prepare($requete);
            
            $requete_preparee->bindValue(1, $idCategorie, PDO::PARAM_INT);

            $resultat = $requete_preparee->execute();
            $resultat = $requete_preparee->fetchAll(PDO::FETCH_ASSOC);

            return $resultat;
        } catch (PDOException $error) {
            return "Erreur : " . $error->getMessage();
        }
    }

    // Fonction qui selectionne toute les données de la table video et de la table utilisateur en mettant en rapport la clé secondaire ID_Utilisateur et renvoi un echo d un tableau en json
    public function selectVideoTagID($idTag)
    {
        try {
            $requete = "SELECT * FROM `tag_video` 
                         INNER JOIN video ON video.ID_Video = tag_video.ID_Video
                         INNER JOIN tag ON tag.ID_Tag = tag_video.ID_Tag
                         where tag_video.ID_Tag = ?";


            $requete_preparee = $this->connexionPDO->prepare($requete);

            $requete_preparee->bindValue(1, $idTag, PDO::PARAM_STR);

            $resultat = $requete_preparee->execute();
            $resultat = $requete_preparee->fetchAll(PDO::FETCH_ASSOC);
            
            return $resultat;
        } catch (PDOException $error) {
            return "Erreur : " . $error->getMessage();
        }
    }

    // Fonction qui selectionne toute les données de la table video et toute leurs categories,tags et les informations concernant la personne qui l a publié en utilisant l'ID_Video
    public function selectVideoUtilisateurCategorieTag($idVideo)
    {

        try {
            $requete = "SELECT * FROM `categorie_video` 
                    INNER JOIN video ON video.ID_Video = categorie_video.ID_Video 
                    INNER JOIN categorie ON categorie.ID_Categorie = categorie_video.ID_Categorie
                    INNER JOIN tag_video ON tag_video.ID_Video = video.ID_Video
                    INNER JOIN tag ON tag.ID_Tag = tag_video.ID_Tag
                    INNER JOIN utilisateur ON utilisateur.ID_Utilisateur = video.ID_Utilisateur 
                    where video.ID_Video = ?";

            $requete_preparee = $this->connexionPDO->prepare($requete);

            $requete_preparee->bindValue(1, $idVideo, PDO::PARAM_STR);

            $resultat = $requete_preparee->execute();
            $resultat = $requete_preparee->fetchAll(PDO::FETCH_ASSOC);
            return $resultat;
        } catch (PDOException $error) {
            return "Erreur : " . $error->getMessage();
        }
    }

     //fonction pour selectionner des elements dans la bdd
     public function selectUtilisateur($email){
        try {
            $requete = "SELECT * from utilisateur where email = :email";

            $requete_preparee = $this->connexionPDO->prepare($requete);
            $requete_preparee->bindParam(":email", $email,PDO::PARAM_STR);
            $resultat = $requete_preparee->execute();
            $resultat = $requete_preparee->fetchAll(PDO::FETCH_ASSOC);

            return $resultat;

        } catch (PDOException $error) {
            return "Erreur : " . $error->getMessage();
        }
    }

     //Fonction d'insertion d'utilisateur (abonnement)
     public function insertionUtilisateur($nom,$prenom,$pseudo,$mail,$mdp,$role){
        try {
            $requete = " INSERT INTO utilisateur(nom, prenom,pseudo,email,mdp,role)
                VALUES (:nom, :prenom, :pseudo,:email, :mdp, :role
                )";
            $requete_preparee = $this->connexionPDO->prepare($requete);

            $requete_preparee->bindParam(':nom',$nom,PDO::PARAM_STR,30);
            $requete_preparee->bindParam(':prenom',$prenom,PDO::PARAM_STR,50);
            $requete_preparee->bindParam(':pseudo',$pseudo,PDO::PARAM_STR);
            $requete_preparee->bindParam(':email',$mail,PDO::PARAM_STR);
            $requete_preparee->bindParam(':mdp',$mdp,PDO::PARAM_STR);
            $requete_preparee->bindParam(':role',$role,PDO::PARAM_STR);
            
            $requete_preparee->execute();
            echo ("insertion reussi");
            return "insertion reussi";

        } catch(PDOException $e) {
            return $e->getMessage();
        }
    }
    
    

    public function deleteMedecin_Secure($id)
    {
        try {
            $requete = "DELETE FROM client WHERE idMedecin = :id";
            $requete_preparee = $this->connexionPDO->prepare($requete);

            $requete_preparee->bindParam(':id', $id, PDO::PARAM_INT);
            $requete_preparee->execute();
            return "insersion reussie";
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

    

}

$connexion = new MaConnexion("plateform_streaming", "", "root", "localhost");

//$test = $connexion->selectVideoUtilisateuID(2);
//var_dump($test);

//$jumbo->miseAJour_Secure("produit","Nom","Ruban adhesif",5);