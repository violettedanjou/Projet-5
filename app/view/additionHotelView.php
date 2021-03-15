<?php $title = "Ajout d'hôtel";

ob_start(); ?>

<div class="container">
    <div class="row add">
        <div class="col">
            <h1>Nouvel hotel</h1>

            <p class="btn_return_admin_page">
                <a href="index.php?action=openAdmin">
                    <i class="fas fa-arrow-left"></i>Retour
                </a>
            </p>

            <div id="form-add-hotel">
                <form action="index.php?action=validNewHotel" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id">
                    <h6>Nom de l'hotel</h6>
                    <input id="title-change" type="text" name="name"/><br/>
                    <h6>Description des l'hotel</h6>
                    <textarea id="content-change" name="content"></textarea><br/>
                    <h6>Localisation</h6>
                    <textarea id="location-change" name="location"></textarea><br/>
                    <h6>Description des chambres</h6>
                    <textarea id="rooms-change" name="rooms"></textarea><br/>
                    <h6>Prix des chambres</h6>
                    <textarea id="prices-change" name="prices"></textarea><br/>
                    <h6>Services de l'hotel</h6>
                    <label>Piscine</label><input type="checkbox" name="swimming_pool"> 
                    <label>Accès plage</label><input type="checkbox" name="beach_access"><br/>
                    <label>Parking</label><input type="checkbox" name="car_park">
                    <label>Wifi</label><input type="checkbox" name="free_wifi"><br/>
                    <label>Restaurant</label><input type="checkbox" name="restaurant">
                    <label>Chambres familiales</label><input type="checkbox" name="family_rooms"><br/>
                    <label>Tévélision</label><input type="checkbox" name="television">
                    <label>Navette aéroport</label><input type="checkbox" name="airport_shuttle"><br/>
                    <label>Air conditionné</label><input type="checkbox" name="air_conditioner">
                    <label>Hôtel non fumeurs</label><input type="checkbox" name="no_smokers"><br/>
                    <label>Animaux acceptés</label><input type="checkbox" name="animals">
                    <label>Coffre fort</label><input type="checkbox" name="strongbox"><br/>
                    <label>Mini bar</label><input type="checkbox" name="mini_bar">
                    <label>Bagagerie</label><input type="checkbox" name="luggage"><br/>
                    <label>Ascenseur </label><input type="checkbox" name="elevator">
                    <label>Sauna</label><input type="checkbox" name="sauna"><br/>
                    <input type="file" name="pictureHotel" /><br/>
                    <input type="submit" value="Enregistrer" id="button-change-activity" />
              </form>
            </div>
        </div>
    </div>
</div>



<?php $content = ob_get_clean(); 
require('app/view/template.php');
?>







