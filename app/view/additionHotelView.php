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