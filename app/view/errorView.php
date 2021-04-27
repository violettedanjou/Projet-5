<?php $title = "Erreur";

ob_start(); ?>

<body id="body-error">
	<h1>Erreur</h1>

	<div class="container">
		<div class="row error">
			<div class="col">
				<div>
					<?php 
					echo "" . $e->getMessage();
					?> 
					<br/>
					<a href="index.php" class="btn_return_index">
						<i class="fas fa-arrow-left"></i>Retour accueil
					</a>
				</div>
			</div>
		</div>
	</div>
</body>

<?php 
$content = ob_get_clean(); 
require('app/view/template.php');
?>