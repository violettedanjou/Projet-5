<?php $title = "Admin - Hotels";

ob_start(); ?>

<h1>GESTION DES HOTELS</h1>

<p> <!-- Lien de retour vers page administration -->
	<a href="index.php?action=openAdmin">
		<i class="fas fa-arrow-left"></i>Retour
	</a>			
</p>

<div class="container">
	<div class="row admin">
		<div class="col">
			<a class="link-add" href="index.php?action=openNewHotel">Ajouter</a><br/>
				<br/>
			<?php
			while ($data = $hotelsAdmin->fetch()) : ?>		
			    <div class="news-admin">
			    	<a class="link-edit" href="index.php?action=openChangeHotel&amp;id=<?= $data['id'] ?>">Modifier</a>

			    	<div class="news-img-text">
			    		<div class="col-lg-6">
			    			<img class="img-admin" src="<?= $data['picture'] ?>" alt="Hotel <?= htmlspecialchars_decode($data['name']) ?>">
			    		</div>
			    		
			    		<div class="col-lg-6">
			    			<div class="news-text-admin">
					    		<h3>
						        	<a href="index.php?action=hotel&amp;id=<?= $data['id'] ?>">
						            	<?= htmlspecialchars_decode($data['name']) ?>
						            </a>
					        	</h3>

					       		<div><?= nl2br(htmlspecialchars_decode($data['content'])) ?> <br/></div>
					    	</div>
			    		</div>
				    	
			    	</div>
			    	
			    	<a class="link-delete" href="index.php?action=validDeleteHotel&amp;id=<?= $data['id'] ?>">Supprimer</a>
		    	</div>
			<?php 
			endwhile; 
			$hotelsAdmin->closeCursor(); ?>
		</div>
	</div>
</div>

<?php $content = ob_get_clean(); 
require('app/view/template.php');
?>