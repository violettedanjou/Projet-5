<?php $title = "Admin - Signalements";

ob_start(); ?>

<h1>GESTION DES AVIS SIGNALES</h1>

<p> <!-- Lien de retour vers page administration -->
	<a href="index.php?action=openAdmin">
		<i class="fas fa-arrow-left"></i>Retour
	</a>			
</p>

<div class="container">
	<div class="row reports">
		<div class="col">
			<?php
			while ($data = $admin->fetch())
			{ ?>
				<div class="news-report">
					<h4>
			            <em>Le <?= $data['opinion_date_fr'] ?></em>
						<?= $data['id'] ?> <br/>
			        </h4>

					<div id="p-reports">
						<em><a class="link-report-remove" href="index.php?action=deleteReport&amp;id=<?= $data['id'] ?>">Retirer le signalement</a></em>
						<?= nl2br(($data['content'])) ?>
						<em><a class="link-delete-opinion" href="index.php?action=deleteOpinion&amp;id=<?= $data['id'] ?>">Supprimer l'avis</a></em>
					</div>

				</div>
			<?php
			}
			$admin->closeCursor(); ?>
		</div>
	</div>
</div>

<?php $content = ob_get_clean(); 
require('app/view/template.php');
?>