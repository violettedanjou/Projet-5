<?php $title = "Modification d'activité";

ob_start(); ?>

<div class="container">
    <div class="row change">
        <div class="col">
            <h1>Modification</h1>

            <p class="btn_return_admin_page">
                <a href="index.php?action=openActivitiesAdmin">
                    <i class="fas fa-arrow-left"></i>Retour
                </a>
            </p>

            <div class="news-img-text">
                <img src="<?= $changeActivity['picture'] ?>" alt="Activite : <?= htmlspecialchars_decode($changeActivity['title']); ?>">
                <div class="news-text-admin">
                    <h3>
                        <?= htmlspecialchars_decode($changeActivity['title']); ?>
                    </h3>
                        
                    <p>
                        <?= nl2br(htmlspecialchars_decode($changeActivity['content'])) ?>
                    </p>
                </div> 
            </div>

            <div class="form-change">
                <form action="index.php?action=validChangeActivity" method="POST">
                    <h2>Modifier l'activite</h2>
                    <input type="hidden" name="id" value="<?= htmlspecialchars_decode($changeActivity['id'])?>">
                    <h6>Titre</h6>
                    <input class="title-change" type="text" name="title" value="<?= htmlspecialchars_decode($changeActivity['title'])?>"/><br/>
                    <h6>Description de l'activité</h6>
                    <textarea id="content-change" name="content"><?= htmlspecialchars_decode($changeActivity['content'])?></textarea><br/>
                    <input type="submit" value="Enregistrer" id="button-change-activity" />
                </form>
            </div>

            <div class="form-change-img">
                <h2>Modifier l'image de l'activite</h2>
                    <?php $imgActivity = $changeActivity; ?>
                        <img id="img-profile" src="<?= $imgActivity['picture']?>" alt="Image de profile">
                    <form action="index.php?action=changeImgActivity&amp;id=<?= $_GET['id'] ?>" method="POST" enctype="multipart/form-data">
                      <input type="file" name="changeImgActivity" /><br/>
                      <input type="submit" value="Enregistrer l'image" id="button-change-activity" />
                    </form>
            </div>

            <div class="form-change-weather">
                <h2>Modifier la meteo recommandee</h2>
                <form action="index.php?action=updateWeather&amp;id=<?= $_GET['id'] ?>" method="POST">
                    <?php 
                    if ($changeActivity['weather'] == 1) : ?>
                        <input type="radio" name="weather" value="1" id="1" checked="checked"><label for="1">Bonne météo (soleil ou nuages)</label><br/>
                    <?php 
                    ;
                    else : ?>
                        <input type="radio" name="weather" value="1" id="1"><label for="1">Bonne météo (soleil ou nuages)</label><br/>
                    <?php
                    endif;
                    if ($changeActivity['weather'] == 0) : ?>
                        <input type="radio" name="weather" value="0" id="0" checked="checked"><label for="0">Mauvaise météo (pluie ou orages)</label><br/>
                    <?php
                    ;
                    else : ?>
                       <input type="radio" name="weather" value="0" id="0"><label for="0">Mauvaise météo (pluie ou orages)</label><br/> 
                    <?php
                    endif;
                    ?>
                    
                  <input type="submit" value="Enregistrer l'activite" id="button-add-activity" />
                </form>                       
            </div>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); 
require('app/view/template.php');
?>