<?php $title = "Modification d'hôtel";

ob_start(); ?>

<div class="container">
    <div class="row change">
        <div class="col">
            <h1>Modification</h1>

            <p class="btn_return_admin_page">
                <a href="index.php?action=openAdmin">
                    <i class="fas fa-arrow-left"></i>Retour
                </a>
            </p>

            <div class="news-hotels"> <!-- Récupérer l'image, le titre, le contenu, localisation, description et prix des chambres de l'hotel selon son id -->
                <img class="img-hotel-view" src="<?= $change['picture'] ?>" alt="Image de l'hotel <?= $hotel['name'] ?>">
                    
                <div>
                    <h3>
                        <?= htmlspecialchars($change['name']); ?>
                    </h3>
                                
                    <div class="p-content-location">
                        <span class="span-hotel-content"><?= nl2br($change['content']); ?><br/></span>
                        <span class="span-location-icon"><i class="fas fa-map-marker-alt"></i><?= nl2br($change['location']); ?></span>
                    </div>

                    <div class="p-rooms">
                        <?= nl2br($change['rooms']); ?><br/>
                    </div>

                    <div class="p-prices">
                        <?= nl2br($change['prices']); ?>
                    </div>
                </div> 
            </div>

            <div class="form-change">
                <form action="index.php?action=validChangeHotel" method="POST">
                    <h2>Modifier l'hotel</h2>
                    <input type="hidden" name="id" value="<?= $change['id']?>">
                    <h6>Nom de l'hotel</h6>
                    <input id="title-change" type="text" name="name" value="<?= $change['name']?>"/><br/>
                    <h6>Description des l'hotel</h6>
                    <textarea id="content-change" name="content"><?= $change['content']?></textarea><br/>
                    <h6>Localisation</h6>
                    <textarea id="location-change" name="location"><?= $change['location']?></textarea><br/>
                    <h6>Description des chambres</h6>
                    <textarea id="rooms-change" name="rooms"><?= $change['rooms']?></textarea><br/>
                    <h6>Prix des chambres</h6>
                    <textarea id="prices-change" name="prices"><?= $change['prices']?></textarea><br/>
                    <input type="submit" value="Enregistrer" id="button-change-activity" />
              </form>
            </div>

            <div class="form-change-img">
                <form action="index.php?action=changeImgHotel" method="POST" enctype="multipart/form-data">
                    <input type="file" name="changeImgHotel" /><br/>
                    <input type="submit" value="Enregistrer l'image" id="button-change-activity" />
                </form>
            </div>

            <div class="form-change-services">
                <form action="index.php?action=changeServicesHotel" method="POST">
                    <h2>Modifier les services proposés par l'hotel</h2>
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

                    <input type="submit" value="Enregistrer" id="button-change-activity" />
                </form>
            </div>
        </div>
    </div>
</div>



<?php $content = ob_get_clean(); 
require('app/view/template.php');
?>