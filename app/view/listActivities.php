<?php $title = 'Liste des activités'; 

ob_start(); ?>

<div class="container">
	<div class="row">
		<div>
			<h1>VIVRE LA NOUVELLE CALEDONIE</h1>

			<p> <!-- Lien de retour vers accueil -->
			<?php 	if(isset($_SESSION['admin']) && ($_SESSION['admin'] != 0)):  ?>
						<a href="index.php?action=listActivitiesHotels">
							<i class="fas fa-arrow-left"></i>Accueil
						</a>
			<?php 	;
					else : ?>
						<a href="index.php?action=listActivitiesHotels">
							<i class="fas fa-arrow-left"></i>Accueil
						</a>
			<?php	endif; ?>			
			</p>

			<div>
				<?php
       		    while ($data = $listActivities->fetch()) : ?>
                    <div class="news-list">
                    	<div class="col-lg-6">
                    		<a href="index.php?action=activity&amp;id=<?= $data['id'] ?>">
	                            <img class="img-home" src="<?= $data['picture'] ?>" alt="Photo de l'activite <?= $data['title'] ?>">
	                        </a>
                    	</div>
                        <div class="col-lg-6">
                        	<div class="news-text">
                                <h3>
                                    <a href="index.php?action=activity&amp;id=<?= $data['id'] ?>">
                                        <?= htmlspecialchars_decode($data['title']) ; ?>
                                        <br/>
                                    </a>
                                </h3>
                                    <div><?= nl2br(htmlspecialchars_decode($data['content'])) ?></div>
                                           
                                    <em class="link-opinions"><a href="index.php?action=activity&amp;id=<?= $data['id'] ?>">Avis</a></em>
                            </div>
                        </div>
                            
                    </div>
                <?php
                endwhile; 
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