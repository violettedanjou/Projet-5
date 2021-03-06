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
                <form action="index.php?action=validChange" method="POST">
                    <h2>Modifier l'activite</h2>
                    <input type="hidden" name="id" value="<?= $change['id']?>">
                    <input id="title-change" type="text" name="title" value="<?= $change['title']?>"/><br/>
                    <textarea id="content-change" name="content"><?= $change['content']?></textarea><br/>
                    <input type="file" name="pictureChange" /><br/>
                    <input type="submit" value="Enregistrer" id="button-change-activity" />
              </form>
            </div>
        </div>
    </div>
</div>



<?php $content = ob_get_clean(); 
require('app/view/template.php');
?>