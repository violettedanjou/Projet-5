<?php $title = "Ajout d'activité"; 

ob_start(); ?>

<h1>Nouvelle activité</h1>

<p class="btn_return_admin_page">
	<a href="index.php?action=openAdmin">
		<i class="fas fa-arrow-left"></i>Retour
	</a>
</p>

<div id="form-add-new-activity">
	<form action="index.php?action=validNewActivity" method="POST">
      <input type="text" name="title" placeholder="Titre de l'activité" class="input-add-new-activity" id="title-add-new-activity" /><br/>
      <textarea name="content" placeholder="Contenu..." class="input-add-new-activity" id="content-add-new-activity"></textarea><br/>
      <input type="submit" value="Enregistrer l'activité" id="button-send-activity" />
    </form>
</div>

<div id="form-add-new-picture">
	<form action="index.php?action=validPicture" method="POST">
      <input type="file" name="picture" /><br/>
      <input type="submit" value="Enregistrer l'image" id="button-send-picture" />
    </form>
</div>

<?php $content = ob_get_clean(); 
require('app/view/template.php');
?>