<?php $title = "Erreur";

ob_start(); ?>

<h1>Erreur</h1>

<div id="div-error">
	<?php 
	echo "" . $e->getMessage();
	?> 
	<br/>
	<a href="index.php" class="btn_return_index">
		<i class="fas fa-arrow-left"></i>Retour
	</a>
</div>

<?php 
$content = ob_get_clean(); 
require('app/view/template.php');
?>