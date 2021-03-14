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
                                
                    <p id="p-content-location">
                        <span id="span-hotel-content"><?= nl2br($change['content']); ?><br/></span>
                        <span><i class="fas fa-map-marker-alt"></i><?= nl2br($change['location']); ?></span>
                    </p>
                    <p id="p-rooms">
                        <?= nl2br($change['rooms']); ?><br/>
                    </p>
                    <p id="p-prices">
                        <?= nl2br($change['prices']); ?>
                    </p>
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
                </form>
            </div>
        </div>
    </div>
</div>



<?php $content = ob_get_clean(); 
require('app/view/template.php');
?>