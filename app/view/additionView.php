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
      <input type="text" name="title" placeholder="Titre du billet" class="input-add-new-post" id="title-add-new-post" /><br/>
      <textarea name="content" placeholder="Contenu..." class="input-add-new-post" id="content-add-new-post"></textarea><br/>
      <input type="file" name="pictures" /><br/>
      <input type="submit" value="Enregistrer l'activité" id="button-send-post" />
    </form>
</div>


<?php $content = ob_get_clean(); 
require('app/view/template.php');
?>