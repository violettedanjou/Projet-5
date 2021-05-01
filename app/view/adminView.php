<?php $title = "Administration";

ob_start(); ?>

<h1>ADMINISTRATION</h1>

<div class="container">
	<div class="row admin-home">
		<div class="col">
			<a href="index.php?action=openActivitiesAdmin">
				<h2>GESTION DES ACTIVITES</h2>
			</a>
		</div>
	</div>
</div>


<div class="container">
	<div class="row admin-home">
		<div class="col">
			<a href="index.php?action=openHotelsAdmin">
				<h2>GESTION DES HOTELS</h2>
			</a>
		</div>
	</div>
</div>


<div class="container">
	<div class="row admin-home">
		<div class="col">
			<a href="index.php?action=openReportsAdmin">
				<h2>GESTION DES AVIS SIGNALES</h2>
			</a>
		</div>
	</div>
</div>

<h1 id="h1-usefuls">LISTE DES AVIS UTILES <i class="far fa-thumbs-up"></i></h1>
<div class="container">
	<div class="row useful">
		<div class="col">
			<?php
			while ($data = $useful->fetch()) : ?>
			
				<div class="news-useful">
					<h4>
			            <em>Le <?= htmlspecialchars_decode($data['opinion_date_fr']) ?></em>
						<?= htmlspecialchars_decode($data['id']) ?> <br/>
			        </h4>

					<div id="p-useful">
						<?= nl2br(htmlspecialchars_decode($data['content'])) ?>
					</div>

				</div>
			<?php
			endwhile;
			$useful->closeCursor(); ?>
		</div>
	</div>
</div>

<?php $content = ob_get_clean(); 
require('app/view/template.php');
?>