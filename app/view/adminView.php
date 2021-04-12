<?php $title = "Administration";

ob_start(); ?>

<h1>GESTION DES ACTIVITES</h1>
<div class="container">
	<div class="row admin">
		<div class="col">
			<a class="link-add" href="index.php?action=openNewActivity">Ajouter</a><br/>
				<br/>
			<?php
			while ($data = $activities->fetch()) 
			{
			?>
			    <div class="news-admin">
			    	<a class="link-edit" href="index.php?action=openChangeActivity&amp;id=<?= $data['id'] ?>">Modifier</a>

			    	<div class="news-img-text">
			    		<img src="<?= $data['picture'] ?>" alt="Photo de l'activite <?= $data['title'] ?>">

				    	<div class="news-text-admin">
				    		<h3>
					        	<a href="index.php?action=activity&amp;id=<?= $data['id'] ?>">
					            	<?= htmlspecialchars($data['title']) ?>
					            </a>
				        	</h3>

				       		<p><?= nl2br($data['content']) ?> <br/></p>
				    	</div>
			    	</div>
			    	

			    	<a class="link-delete" href="index.php?action=validDeleteActivity&amp;id=<?= $data['id'] ?>">Supprimer</a>
		    	</div>
			<?php 
			} 
			$activities->closeCursor(); ?>

            <nav> <!-- Pagination -->
                <ul class="pagination">
                    <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                        <a href="./?pageAdmin=<?= $currentPage - 1 ?>" class="page-link">Precedente</a>
                    </li>

                    <?php for($page = 1; $page <= $pagesAdmin; $page++): ?>
                        <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                        <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                            <a href="./?pageAdmin=<?= $page ?>" class="page-link"><?= $page ?></a>
                        </li>
                    <?php endfor ?>

                        <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                        <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                            <a href="./?pageAdmin=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
                        </li>
                </ul>
            </nav>
		</div>
	</div>
</div>


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


<h1>GESTION DES AVIS SIGNALES</h1>
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

<h1>LISTE DES AVIS UTILES</h1>
<div class="container">
	<div class="row useful">
		<div class="col">
			<?php
			while ($data = $useful->fetch())
			{ ?>
				<div class="news-useful">
					<h4>
			            <em>Le <?= $data['opinion_date_fr'] ?></em>
						<?= $data['id'] ?> <br/>
			        </h4>

					<div id="p-useful">
						<?= nl2br(($data['content'])) ?>
					</div>

				</div>
			<?php
			}
			$useful->closeCursor(); ?>
		</div>
	</div>
</div>

<?php $content = ob_get_clean(); 
require('app/view/template.php');
?>










