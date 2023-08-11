$(document).ready(function() {
    // Sélectionner la vidéo par sa classe en utilisant jQuery
    var video = $(".videoContainer");
    
    // Temps en secondes auquel vous souhaitez que la vidéo démarre
    var initialTime = 3;  // Par exemple, 30 secondes
    
    // Définir le temps initial de la vidéo
    for (var i = 0; i < video.length; i++) {
        video[i].currentTime = initialTime;
    }
    
    // Lance la video lorsque la souris passe sur la video
    $(".videoContainer").mouseenter(function () {
        this.play();
    });
    
    // Lance la video lorsque la souris passe sur la video
    $(".videoContainer").mouseleave(function () {
        this.pause();
    });
   
    ///////////////////////////////////////////////////////////////////////////////////////:
    
    //Selectionner les vidéos par la catégorie
    /*
    $("#btnrechcat1").click(function (e) {
        e.preventDefault();
        
        var formData = {
            nomrechercheCategorie:$("#1").val(),
    
        };
        
        var type = "POST";
        var ajaxurl = "module/selectionCategorie.php";
        
        $.ajax({
            type: type,  //methode
            url: ajaxurl, // action
            data: formData, 
            dataType: 'json', //Ce que la requete va renvoyé
            
            success: function (data) {
                //console.log(data);
                //Ici, vous pouvez effectuer les actions après de la requête, par exemple affic
                alert("Données envoyées avec succes !");
                
                $nouveauTableau = "";
                for (var i = 0; i < data.length; i++) {
                    $nouveauTableau = $nouveauTableau +                 `
                    <form action="lecteur.php" method="POST">
                        <div class="carteVideo">
                            <button class="videoBouton">
                                <video src="${data[i]['lien']}" class="videoContainer" muted></video>
                            </button>
                            <h4>${data[i]['titre']}</h4>
                            <div class="textCarteVideo">
                                <p>Un pseudo</p>
                                <p>${data[i]['duree']}</p>
                            </div>
                        </div>
                        <input type="hidden" name="ID_Video" value="${data[i]['ID_Video']}">
                    </form>`;
                }
                $("#ajax").html($nouveauTableau);
              
            
              },
              
              error: function (xhr, status, error){
                //Ici, vous pouvez effectuer des actions en cas d'erreur de la requete
                console.log("Erreur AJAX : " + error);
                console.log("Erreur AJAX : " + status);
                console.log("Erreur AJAX : " + xhr);
              }
        });
        
    })
    */


});