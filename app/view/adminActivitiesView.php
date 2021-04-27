<?php $title = "Admin - Activittés";

ob_start(); ?>

<h1>GESTION DES ACTIVITES</h1>

<p> <!-- Lien de retour vers page administration -->
	<a href="index.php?action=openAdmin">
		<i class="fas fa-arrow-left"></i>Retour
	</a>			
</p>

<div class="container">
	<div class="row admin">
		<div class="col">
			<a class="link-add" href="index.php?action=openNewActivity">Ajouter</a><br/>
				<br/>
			<?php
			while ($data = $activitiesAdmin->fetch()) : ?>
			    <div class="news-admin">
			    	<div>
			    		<a class="link-edit" href="index.php?action=openChangeActivity&amp;id=<?= $data['id'] ?>">Modifier</a>
			    	</div>
			    	
			    	<div>
			    		<div class="news-img-text">
			    			<div class="col-lg-6">
			    				<img class="img-admin" src="<?= $data['picture'] ?>" alt="Photo de l'activite <?= $data['title'] ?>">
			    			</div>
				    		
			    			<div class="col-lg-6">
			    				<div class="news-text-admin">
						    		<h3>
							        	<a href="index.php?action=activity&amp;id=<?= $data['id'] ?>">
							            	<?= htmlspecialchars($data['title']) ?>
							            </a>
						        	</h3>

						       		<p><?= nl2br($data['content']) ?> <br/></p>
						    	</div>
			    			</div>
					    	
				    	</div>
			    	</div>
			    	
			    	<div>
			    		<a class="link-delete" href="index.php?action=validDeleteActivity&amp;id=<?= $data['id'] ?>">Supprimer</a>
			    	</div>

			    	
		    	</div>
			<?php 
			endwhile; 
			$activitiesAdmin->closeCursor(); ?>
		</div>
	</div>
</div>

<?php $content = ob_get_clean(); 
require('app/view/template.php');
?>