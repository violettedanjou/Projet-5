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
                    <label>Piscine</label><input type="checkbox" name="services[]" value="1"><br/>
                    <label>Accès plage</label><input type="checkbox" name="services[]" value="2"><br/>
                    <label>Parking</label><input type="checkbox" name="services[]" value="3"><br/>
                    <label>Wifi</label><input type="checkbox" name="services[]" value="4"><br/>
                    <label>Restaurant</label><input type="checkbox" name="services[]" value="5"><br/>
                    <label>Chambres familiales</label><input type="checkbox" name="services[]" value="6"><br/>
                    <label>Tévélision</label><input type="checkbox" name="services[]" value="7"><br/>
                    <label>Navette aéroport</label><input type="checkbox" name="services[]" value="8"><br/>
                    <label>Air conditionné</label><input type="checkbox" name="services[]" value="9"><br/>
                    <label>Hôtel non fumeurs</label><input type="checkbox" name="services[]" value="10"><br/>
                    <label>Animaux acceptés</label><input type="checkbox" name="services[]" value="11"><br/>
                    <label>Coffre fort</label><input type="checkbox" name="services[]" value="12"><br/>
                    <label>Mini bar</label><input type="checkbox" name="services[]" value="13"><br/>
                    <label>Bagagerie</label><input type="checkbox" name="services[]" value="14"><br/>
                    <label>Ascenseur </label><input type="checkbox" name="services[]" value="15"><br/>
                    <label>Sauna</label><input type="checkbox" name="services[]" value="16"><br/>

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







