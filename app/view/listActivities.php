<?php $title = 'Liste des activités'; 

ob_start(); ?>

<div class="container">
	<div class="row">
		<div class="col">
			<h1>VIVRE LA NOUVELLE CALEDONIE</h1>

			<p> <!-- Lien de retour vers liste des activités -->
			<?php 	if(isset($_SESSION['admin']) && ($_SESSION['admin'] != 0)) { ?>
						<a href="index.php?action=openAdmin">
							<i class="fas fa-arrow-left"></i>Accueil
						</a>
			<?php 	}
					else { ?>
						<a href="index.php">
							<i class="fas fa-arrow-left"></i>Accueil
						</a>
			<?php	} ?>			
			</p>
			
			<div>
				<?php
       		    while ($data = $listActivities->fetch()) 
                { ?>
                    <div class="news">
                        <a href="index.php?action=activity&amp;id=<?= $data['id'] ?>">
                            <img class="img-home" src="<?= $data['picture'] ?>" alt="Photo de l'activite <?= $data['title'] ?>">
                        </a>
                            <div class="news-text">
                                <h3>
                                    <a href="index.php?action=activity&amp;id=<?= $data['id'] ?>">
                                        <?= htmlspecialchars($data['title']) ; ?>
                                        <br/>
                                    </a>
                                </h3>
                                    <p><?= nl2br($data['content']) ?></p>
                                           
                                    <em class="link-opinions"><a href="index.php?action=activity&amp;id=<?= $data['id'] ?>">Avis</a></em>
                            </div>
                    </div>
                <?php
                } 
                $listActivities->closeCursor(); ?>

                <nav> <!-- Pagination -->
                    <ul class="pagination">
                        <li class="page-item <?= ($currentPageActivities == 1) ? "disabled" : "" ?>">
                            <a href="./?action=listActivities&amp;page=<?= $currentPageActivities - 1 ?>" class="page-link">Precedente</a>
                        </li>

                        <?php for($page = 1; $page <= $pagesActivities; $page++): ?>
                        	<!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                            <li class="page-item <?= ($currentPageActivities == $page) ? "active" : "" ?>">
                                <a href="./?action=listActivities&amp;page=<?= $page ?>" class="page-link"><?= $page ?></a>
                            </li>
                        <?php endfor ?>

                            <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                            <li class="page-item <?= ($currentPageActivities == $pagesActivities) ? "disabled" : "" ?>">
                                <a href="./?action=listActivities&amp;page=<?= $currentPageActivities + 1 ?>" class="page-link">Suivante</a>
                            </li>
                    </ul>
                </nav>
            </div>
		</div>
	</div>
</div>	
<?php $content = ob_get_clean();
require('app/view/template.php'); ?>