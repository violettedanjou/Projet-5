<?php $title = "Administration";

ob_start(); ?>

<h1>GESTION DES ACTIVITES</h1>

<?php
while ($data = $activities->fetch())
{
?>
    <div class="news">
    	<em><a href="index.php?action=openNewActivity?>">Ajouter</a></em>

    	<div>
    		<em><a class="link-edit" href="index.php?action=openEdition&amp;id=<?= $data['id'] ?>">Modifier</a></em>

	        <h3>
	        	<a href="index.php?action=activity&amp;id=<?= $data['id'] ?>">
	            	<?= htmlspecialchars($data['title']) ?>
	            	<em>le <?= $data['creation_date_fr'] ?></em>
	            </a>
	        </h3>
	        <?= nl2br($data['content']) ?> <br/>
		    
			<em><a class="link-delete" href="index.php?action=validDelete&amp;id=<?= $data['id'] ?>">Supprimer</a></em>
    	</div>
    	
    </div>
<?php 
} 
$activities->closeCursor(); ?>

<h1>GESTION DES HOTELS</h1>

<h1>GESTION DES AVIS SIGNALES</h1>



<?php $content = ob_get_clean(); 
require('app/view/template.php');
?>










