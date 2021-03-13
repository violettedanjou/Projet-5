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

            <div id="form-change">
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

            <div id="form-change-img">
                <h2>Modifier l'image</h2>
                    <form action="index.php?action=ChangePictureActivity" method="POST" enctype="multipart/form-data">
                      <input type="file" name="ChangeImgActivity" /><br/>
                      <input type="submit" value="Enregistrer l'image" id="button-change-activity" />
                    </form>
            </div>
        </div>
    </div>
</div>



<?php $content = ob_get_clean(); 
require('app/view/template.php');
?>