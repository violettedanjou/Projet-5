<?php $title = 'Liste des hôtels'; 

ob_start(); ?>

<div class="container">
	<div class="row">
		<div class="col">
			<h1>SE LOGER EN NOUVELLE CALEDONIE</h1>

			<p> <!-- Lien de retour vers liste des activités -->
			<?php 	if(isset($_SESSION['admin']) && ($_SESSION['admin'] != 0)) : ?>
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
       		    while ($data = $listHotels->fetch()) : ?>
                    <div class="news">
                        <div class="col-lg-6">
                            <a href="index.php?action=hotel&amp;id=<?= $data['id'] ?>">
                                <img class="img-home" src="<?= $data['picture'] ?>" alt="Photo de l'hotel <?= $data['name'] ?>">
                            </a>
                        </div>

                        <div class="col-lg-6">
                            <div class="news-text">
                                <h3>
                                    <a href="index.php?action=hotel&amp;id=<?= $data['id'] ?>">
                                        <?= htmlspecialchars($data['name']) ?>
                                        <br/>
                                    </a>
                                </h3>
                                <p><?= nl2br(htmlspecialchars($data['content'])) ?></p>
                                   
                                <em class="link-opinions"><a href="index.php?action=hotel&amp;id=<?= $data['id'] ?>">Avis</a></em>
                            </div>
                        </div>
                    </div>
                <?php
                endwhile; 
                $listHotels->closeCursor(); ?>

                <nav> <!-- Pagination -->
                    <ul class="pagination">
                        <li class="page-item <?= ($currentPageHotels == 1) ? "disabled" : "" ?>">
                            <a href="./?action=listHotels&amp;page=<?= $currentPageHotels - 1 ?>" class="page-link">Precedente</a>
                        </li>

                        <?php for($page = 1; $page <= $pagesHotels; $page++): ?>
                        	<!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                            <li class="page-item <?= ($currentPageHotels == $page) ? "active" : "" ?>">
                                <a href="./?action=listHotels&amp;page=<?= $page ?>" class="page-link"><?= $page ?></a>
                            </li>
                        <?php endfor ?>

                            <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                            <li class="page-item <?= ($currentPageHotels == $pagesHotels) ? "disabled" : "" ?>">
                                <a href="./?action=listHotels&amp;page=<?= $currentPageHotels + 1 ?>" class="page-link">Suivante</a>
                            </li>
                    </ul>
                </nav>
            </div>
		</div>
	</div>
</div>	
<?php $content = ob_get_clean();
require('app/view/template.php'); ?>