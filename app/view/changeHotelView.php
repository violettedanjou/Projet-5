<?php $title = "Modification d'hôtel";

ob_start(); ?>

<div class="container">
    <div class="row change">
        <div class="col">
            <h1>Modification</h1>

            <p class="btn_return_admin_page">
                <a href="index.php?action=openHotelsAdmin">
                    <i class="fas fa-arrow-left"></i>Retour
                </a>
            </p>

            <div class="news-hotels">
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
                    <input class="title-change" type="text" name="name" value="<?= $change['name']?>"/><br/>
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
                <h2>Modifier l'image de l'hotel</h2>
                <?php $imgHotel = $change; ?>
                    <img id="img-profile" src="<?= $imgHotel['picture']?>" alt="Image de profile">
                <form action="index.php?action=changeImgHotel&amp;id=<?= $_GET['id'] ?>" method="POST" enctype="multipart/form-data">
                    <input type="file" name="changeImgHotel" /><br/>
                    <input type="submit" value="Enregistrer l'image" id="button-change-activity" />
                </form>
            </div>

            <div class="form-change-services">
                <form action="index.php?action=changeServicesHotel&amp;id=<?= $_GET['id'] ?>" method="POST">
                    <h2>Modifier les services proposes par l'hotel</h2>
                    <?php 
                        if ($change['swimming_pool'] == 1) : ?>
                            <label>Piscine</label><input type="checkbox" name="services[]" value="1" checked="checked"><br/>
                        <?php 
                        ;
                        else : ?>
                            <label>Piscine</label><input type="checkbox" name="services[]" value="1"><br/>
                        <?php 
                        endif;
                        if ($change['beach_access'] == 1) : ?>
                            <label>Accès plage</label><input type="checkbox" name="services[]" value="2" checked="checked"><br/>
                        <?php 
                        ;
                        else : ?>
                            <label>Accès plage</label><input type="checkbox" name="services[]" value="2"><br/>
                        <?php 
                        endif;
                        if ($change['car_park'] == 1) : ?>
                            <label>Parking</label><input type="checkbox" name="services[]" value="3" checked="checked"><br/>
                        <?php 
                        ;
                        else : ?>
                            <label>Parking</label><input type="checkbox" name="services[]" value="3"><br/>
                        <?php 
                        endif;
                        if ($change['free_wifi'] == 1) : ?>
                            <label>Wifi</label><input type="checkbox" name="services[]" value="4" checked="checked"><br/>
                        <?php 
                        ;
                        else : ?>
                            <label>Wifi</label><input type="checkbox" name="services[]" value="4"><br/>
                        <?php 
                        endif;
                        if ($change['restaurant'] == 1) : ?>
                            <label>Restaurant</label><input type="checkbox" name="services[]" value="5" checked="checked"><br/>
                        <?php 
                        ;
                        else : ?>
                            <label>Restaurant</label><input type="checkbox" name="services[]" value="5"><br/>
                        <?php 
                        endif;
                        if ($change['family_rooms'] == 1) : ?>
                            <label>Chambres familiales</label><input type="checkbox" name="services[]" value="6" checked="checked"><br/>
                        <?php 
                        ;
                        else : ?>
                            <label>Chambres familiales</label><input type="checkbox" name="services[]" value="6"><br/>
                        <?php 
                        endif;
                        if ($change['television'] == 1) : ?>
                            <label>Tévélision</label><input type="checkbox" name="services[]" value="7" checked="checked"><br/>
                        <?php 
                        ;
                        else : ?>
                            <label>Tévélision</label><input type="checkbox" name="services[]" value="7"><br/>
                        <?php 
                        endif;
                        if ($change['airport_shuttle'] == 1) : ?>
                            <label>Navette aéroport</label><input type="checkbox" name="services[]" value="8" checked="checked"><br/>
                        <?php 
                        ;
                        else : ?>
                            <label>Navette aéroport</label><input type="checkbox" name="services[]" value="8"><br/>
                        <?php 
                        endif;
                        if ($change['air_conditioner'] == 1) : ?>
                            <label>Air conditionné</label><input type="checkbox" name="services[]" value="9" checked="checked"><br/>
                        <?php 
                        ;
                        else : ?>
                            <label>Air conditionné</label><input type="checkbox" name="services[]" value="9"><br/>
                        <?php 
                        endif;
                        if ($change['no_smokers'] == 1) : ?>
                            <label>Hôtel non fumeurs</label><input type="checkbox" name="services[]" value="10" checked="checked"><br/>
                        <?php 
                        ;
                        else : ?>
                            <label>Hôtel non fumeurs</label><input type="checkbox" name="services[]" value="10"><br/>
                        <?php 
                        endif;
                        if ($change['animals'] == 1) : ?>
                            <label>Animaux acceptés</label><input type="checkbox" name="services[]" value="11" checked="checked"><br/>
                        <?php 
                        ;
                        else : ?>
                            <label>Animaux acceptés</label><input type="checkbox" name="services[]" value="11"><br/>
                        <?php 
                        endif;
                        if ($change['strongbox'] == 1) : ?>
                            <label>Coffre fort</label><input type="checkbox" name="services[]" value="12" checked="checked"><br/>
                        <?php 
                        ;
                        else : ?>
                            <label>Coffre fort</label><input type="checkbox" name="services[]" value="12"><br/>
                        <?php 
                        endif;
                        if ($change['mini_bar'] == 1) : ?>
                            <label>Mini bar</label><input type="checkbox" name="services[]" value="13" checked="checked"><br/>
                        <?php 
                        ;
                        else : ?>
                            <label>Mini bar</label><input type="checkbox" name="services[]" value="13"><br/>
                        <?php 
                        endif;
                        if ($change['luggage'] == 1) : ?>
                            <label>Bagagerie</label><input type="checkbox" name="services[]" value="14" checked="checked"><br/>
                        <?php 
                        ;
                        else : ?>
                            <label>Bagagerie</label><input type="checkbox" name="services[]" value="14"><br/>
                        <?php 
                        endif;
                        if ($change['elevator'] == 1) : ?>
                            <label>Ascenseur </label><input type="checkbox" name="services[]" value="15" checked="checked"><br/>
                        <?php 
                        ;
                        else : ?>
                            <label>Ascenseur </label><input type="checkbox" name="services[]" value="15"><br/>
                        <?php 
                        endif;
                        if ($change['sauna'] == 1) : ?>
                            <label>Sauna</label><input type="checkbox" name="services[]" value="16" checked="checked"><br/>
                        <?php 
                        ;
                        else : ?>
                            <label>Sauna</label><input type="checkbox" name="services[]" value="16"><br/>
                        <?php 
                        endif;
                    ?>
                    <input type="submit" value="Enregistrer" id="button-change-activity" />
                </form>
            </div>
        </div>
    </div>
</div>



<?php $content = ob_get_clean(); 
require('app/view/template.php');
?>