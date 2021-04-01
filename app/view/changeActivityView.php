<?php $title = "Modification d'activité";

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

            <div class="news-img-text">
                <img src="<?= $change['picture'] ?>" alt="Activité sportive ou culturelle proposée par le site">
                <div class="news-text-admin">
                    <h3>
                        <?= htmlspecialchars($change['title']); ?>
                    </h3>
                        
                    <p>
                        <?= nl2br($change['content']) ?>
                    </p>
                </div> 
            </div>

            <div class="form-change">
                <form action="index.php?action=validChangeActivity" method="POST">
                    <h2>Modifier l'activite</h2>
                    <input type="hidden" name="id" value="<?= $change['id']?>">
                    <h6>Titre</h6>
                    <input id="title-change" type="text" name="title" value="<?= $change['title']?>"/><br/>
                    <h6>Description de l'activité</h6>
                    <textarea id="content-change" name="content"><?= $change['content']?></textarea><br/>
                    <input type="submit" value="Enregistrer" id="button-change-activity" />
                </form>
            </div>

            <div class="form-change-img">
                <h2>Modifier l'image</h2>
                    <form action="index.php?action=changeImgActivity" method="POST" enctype="multipart/form-data">
                      <input type="file" name="changeImgActivity" /><br/>
                      <input type="submit" value="Enregistrer l'image" id="button-change-activity" />
                    </form>
            </div>

            <div class="form-change-weather">
                <h2>Modifier la meteo recommandee</h2>
                <form action="index.php?action=updateWeather&amp;id=<?= $_GET['id'] ?>" method="POST">
                    <input type="radio" name="weather" value="1" id="1"><label for="1">Bonne météo (soleil ou nuages)</label><br/>
                    <input type="radio" name="weather" value="0" id="0"><label for="0">Mauvaise météo (pluie ou orages)</label><br/>
                  <input type="submit" value="Enregistrer l'activite" id="button-add-activity" />
                </form>                       

            </div>
        </div>
    </div>
</div>



<?php $content = ob_get_clean(); 
require('app/view/template.php');
?>