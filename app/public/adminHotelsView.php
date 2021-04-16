<?php $title = "Admin - Hotels";

ob_start(); ?>

<h1>GESTION DES HOTELS</h1>
<div class="container">
	<div class="row admin">
		<div class="col">
			<a class="link-add" href="index.php?action=openNewHotel">Ajouter</a><br/>
				<br/>
			<?php
			while ($data = $hotels->fetch()) 
			{
			?>
			    <div class="news-admin">
			    	<a class="link-edit" href="index.php?action=openChangeHotel&amp;id=<?= $data['id'] ?>">Modifier</a>

			    	<div class="news-img-text">
			    		<img src="<?= $data['picture'] ?>" alt="Hotel <?= $data['name'] ?>">

				    	<div class="news-text-admin">
				    		<h3>
					        	<a href="index.php?action=hotel&amp;id=<?= $data['id'] ?>">
					            	<?= htmlspecialchars($data['name']) ?>
					            </a>
				        	</h3>

				       		<p><?= nl2br($data['content']) ?> <br/></p>
				    	</div>
			    	</div>
			    	

			    	<a class="link-delete" href="index.php?action=validDeleteHotel&amp;id=<?= $data['id'] ?>">Supprimer</a>
		    	</div>
			<?php 
			} 
			$hotels->closeCursor(); ?>
		</div>
	</div>
</div>

<?php $content = ob_get_clean(); 
require('app/view/template.php');
?>