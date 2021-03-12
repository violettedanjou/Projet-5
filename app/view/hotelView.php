<?php $title = htmlspecialchars($hotel['name']); 

ob_start(); ?>

<div class="container">
	<div class="row hotels">
		<div class="col">
			<h1><?= htmlspecialchars($hotel['name']) ?></h1>

			<p> <!-- Lien de retour vers accueil -->
			<?php 	if(isset($_SESSION['admin']) && ($_SESSION['admin'] != 0)) { ?>
						<a href="index.php?action=openAdmin">
							<i class="fas fa-arrow-left"></i>Retour
						</a>
			<?php 	}
					else { ?>
						<a href="index.php">
							<i class="fas fa-arrow-left"></i>Retour
						</a>
			<?php	} ?>			
			</p>

			
            <div class="news-img-text"> <!-- Récupérer l'image, le titre, le contenu, localisation, description et prix des chambres de l'hotel selon son id -->
                <img src="<?= $hotel['picture'] ?>" alt="Image de l'hotel <?= $hotel['name'] ?>">
                <div class="news-hotels">
                    <h3>
                        <?= htmlspecialchars($hotel['name']); ?>
                    </h3>
                        
                    <p>
                        <?= nl2br($hotel['location']);
                        nl2br($hotel['rooms']);
                        nl2br($hotel['prices']);
                        ?>
                    </p>
                </div> 
            </div><br/>

			<div id="div-opinions">
						<!-- Si on est connecté, on affiche le formulaire d'ajout d'avis -->
				  <?php if (isset($_SESSION['id'])) { ?> 
							<form id="form-add-opinion" action="index.php?action=addOpinion&amp;id=<?= $hotel['id'] ?>" method="post">
								<h3>Ajouter un avis</h3>
							    <div>
							        <label for="opinion"></label><br /><textarea id="opinion" name="opinion"></textarea>
							    </div>
								<div>
									<input type="submit" id="button_add_opinion" />
								</div>
							</form>	
				  <?php }
						/* Sinon on n'est pas connecté, alors on affiche les formulaires d'inscription et de connexion */
						else { ?>
								<div id="div-session-opinions"> <!-- Les mettre l'un à côté de l'autre grace au CSS qd j'aurais la page sous les yeux -->
									<form class="form-session-opinions" action="index.php?action=validSignup" method="post">
										<h2>S'INSCRIRE</h2>
										<label for="pseudo">Nom / Pseudo </label><input type="text" name="pseudo" class="input-signup" /><br/>
										<label for="pass">Mot de passe </label><input type="password" name="pass" class="input-signup"/><br/>
										<label for="pass_confirm">Confirmation du mot de passe </label><input type="password" name="pass_confirm" class="input-signup"/><br/>
										<label for="email">Adresse email </label><input type="email" name="email"  class="input-signup" style="width: 250px"/><br/>
										<input type="submit" name="signup" value="S'INSCRIRE" id="button_confirm_signup">
									</form>

									
									<form class="form-session-opinions" action="index.php?action=validSignin" method="post">
										<h2>SE CONNECTER</h2>
									    <label for="pseudo">Nom / Pseudo </label><input type="text" name="pseudo" required class="input-signin" /><br/>
									    <label for="pass">Mot de passe </label><input type="password" name="pass" required class="input-signin"/><br/>
									    <input type="submit" name="signin" value="SE CONNECTER" id="button_confirm_signin">
									</form>
								</div>		
					<?php	} ?>

					<div class="list-opinions">
						<h2>AVIS</h2>
							<!-- Commentaires affichés même non connecté -->
					<?php	while ($opinion = $opinions->fetch()) { ?>
							<div id="one-opinion">
							    <h4>
							    	<p><strong><?= htmlspecialchars($opinion['pseudo']) ?></strong> le <?= $opinion['opinion_date_fr'] ?></p> <!-- On récupère le pseudo et la date de l'avis -->
							    </h4>

							    <p>
							    	<?= nl2br(($opinion['content'])) ?> <!-- On récupère le contenu de l'avis -->
							    </p>
							

						 <?php 	if (isset($_SESSION['id'])) { ?> <!-- Si on est connecté, on affiche le lien signaler -->
									<div>
								    	<a id="button-report" href="index.php?action=validReport&amp;id=<?= $opinion['id'] ?>&amp;opinion_id=<?= $opinion['id']?>">Signaler</a>
								    	<a id="button-useful" href="index.php?action=validUseful&amp;id=<?= $opinion['id'] ?>&amp;opinion_id=<?= $opinion['id']?>">Utile<i class="far fa-thumbs-up"></i></a>
								    </div>
						 <?php 	} ?>	

							</div>
				<?php   } 
						$opinions->closeCursor(); ?>					
				</div>

			</div>
		</div>
	</div>
</div>



<?php $content = ob_get_clean();

require('app/view/template.php'); ?>
