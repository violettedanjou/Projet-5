<?php $title = "Ajout d'activité"; 

ob_start(); ?>

<div class="container">
	<div class="row add">
		<div class="col">
			<h1>Nouvelle activite</h1>

			<p class="btn_return_admin_page">
				<a href="index.php?action=openActivitiesAdmin">
					<i class="fas fa-arrow-left"></i>Retour
				</a>
			</p>

			<div id="form-add-activity">
				<form action="index.php?action=validNewActivity" method="POST" enctype="multipart/form-data"> <!-- Grace à enctype, le navigateur sait qu'il va envoyer un fichier -->
			      	<input type="text" name="title" placeholder="Titre de l'activité" class="title-add" /><br/>
			      	<textarea name="content" placeholder="Contenu..." id="content-add-new-activity"></textarea><br/>
			     	<input type="file" name="pictureActivity" /><br/>
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