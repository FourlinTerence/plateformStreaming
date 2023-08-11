# plateformStreaming

Cette application est une plateform de streaming, ou les visiteurs peuvent regarder les videos postés avec quelque fonctionnalité pour les aider a trouver une video qui les conviennent.

Avant de lancer la page, il est necessaire de mettre la base de donnée a jour. Il faut donc commencer par ouvrir dans son editeur de code, le fichier SQL "plateform_streaming.sql", puis lancer le scripte SQL dans la base de donnée.

Une fois la base de donnée prete, vous pouvez lancer l'application web. Commencez par la page d'acceuil. Dans cette page, vous y trouverez l'integralité des videos disponible sur la plateform. En cliquant sur une video, cela vous envoyera vers la page lecteur, ou vous y pourrez lancer la video, et voir toute les informations lié à cette video (comme les catégories lié a la videos, le pseudo de la personne qui l a poster, la description de la video etc...). 

Il est possible de cliquer sur les categories et les tags sur les coté, cela vous envoyera vers la page recherche et filtrera les videos affichés en fonction de la catégorie ou du tag choisi. Sur cette page recherche, vous trouverez au dessous de la navbar deux bouton qui afficherons plusieurs catégorie pour le premier boutons et plusieurs tags sur le deuxieme boutons. En cliquant sur l'une de ces catégories ou sur l'un des tags, cela filtrera les videos affichés selon ce tag ou cette catégorie. Plus tard, il y aura un troisieme bouton pour les pseudos des personnes ayant publier des videos.


Dans la navbar, vous y trouverez le logo de l'entreprise. En cliquant dessus, cela vous ramenera sur la page d'accueil. Ensuite il y a un lien vers la page "recherche". Enfin, vous trouverez deux boutons "inscription" et "connexion". En cliquant sur inscription, cela ouvrira un modale qui contient un formulaire d'inscription. En cliquant sur le bouton "connexion", cela ouvrira un modale de connexion. ( en entrant comme information email : admin@admin.admin et un mot de passe: admin, vous aurez acces a un compte admin).

Une fois connecter, les deux derniers boutons de la navbar disparaitrons et laisserons a la place deux autre bouton. Le premier est un bouton qui renvoie a la page "espace perso". Sur cette page sera afficher toute les videos au auront publier le compte connecter.

Le deuxieme bouton est un "dropdown" contenant, un texte indiquant le nom et le prenom de la personne connecter. En deuxieme, il y a un lien qui servira a déconnecter le compte. Cela reconduira vers la page d'accueil. Enfin, le dernier est un bouton qui appelle le modal quicontiendra un formulaire qui permettra d'ajouter une vidéo.
Ce formulaire sera ajouter.



