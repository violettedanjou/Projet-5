<?php $title = htmlspecialchars($hotel['name']); 

ob_start(); ?>

<body id="body-hotel">
	<div class="container">
		<div class="row hotels">
			<div class="col">
				<h1 id="h1-hotel-view"><?= htmlspecialchars($hotel['name']) ?></h1>

				<p> <!-- Lien de retour vers accueil -->
				<?php 	if(isset($_SESSION['admin']) && ($_SESSION['admin'] != 0)) { ?>
							<a class="fa-arrow-left-hotel" href="index.php?action=openHotelsAdmin">
								<i class="fas fa-arrow-left"></i>Retour
							</a>
				<?php 	}
						else { ?>
							<a class="fa-arrow-left-hotel" href="index.php?action=listHotels">
								<i class="fas fa-arrow-left"></i>Retour
							</a>
				<?php	} ?>			
				</p>

				
	            <div class="news-hotels"> <!-- Récupérer l'image, le titre, le contenu, localisation, description et prix des chambres de l'hotel selon son id -->
	                <img class="img-hotel-view" src="<?= $hotel['picture'] ?>" alt="Image de l'hotel <?= $hotel['name'] ?>">
		            
		            <div>
		                <h3>
		                    <?= htmlspecialchars($hotel['name']); ?>
		                </h3>
		                        
		                <div class="div-content-location">
		                    <span class="span-hotel-content"><?= nl2br($hotel['content']); ?><br/></span>
		                    <span class="span-location-icon"><i class="fas fa-map-marker-alt"></i><?= nl2br($hotel['location']); ?></span>
		                </div>
		                <div class="div-services">
		                	<h4>Services de l'hotel</h4>
		                	<?php if ($hotel['swimming_pool'] == 1) { ?>
		                		<i class="fas fa-swimmer"></i>
		                	<?php 
		                	}
		                	if ($hotel['beach_access'] == 1) { ?>
		                		<i class="fas fa-umbrella-beach"></i>
		                	<?php 
		                	}
		                	if ($hotel['car_park'] == 1) { ?>
		                		<i class="fas fa-parking"></i>
		                	<?php 
		                	}
		                	if ($hotel['free_wifi'] == 1) { ?>
		                		<i class="fas fa-wifi"></i>
		                	<?php 
		                	}
		                	if ($hotel['restaurant'] == 1) { ?>
		                		<i class="fas fa-utensils"></i>
		                	<?php 
		                	}
		                	if ($hotel['family_rooms'] == 1) { ?>
		                		<i class="fas fa-bed"></i>
		                	<?php 
		                	}
		                	if ($hotel['television'] == 1) { ?>
		                		<i class="fas fa-tv"></i>
		                	<?php 
		                	}
		                	if ($hotel['airport_shuttle'] == 1) { ?>
		                		<i class="fas fa-tv"></i>
		                	<?php 
		                	}
		                	if ($hotel['air_conditioner'] == 1) { ?>
		                		<i class="fas fa-wind"></i>
		                	<?php 
		                	}
		                	if ($hotel['no_smokers'] == 1) { ?>
		                		<i class="fas fa-smoking-ban"></i>
		                	<?php 
		                	}
		                	if ($hotel['animals'] == 1) { ?>
		                		<i class="fas fa-paw"></i>
		                	<?php 
		                	}
		                	if ($hotel['strongbox'] == 1) { ?>
		                		<i class="fas fa-archive"></i>
		                	<?php 
		                	}
		                	if ($hotel['mini_bar'] == 1) { ?>
		                		<i class="fas fa-glass-cheers"></i>
		                	<?php 
		                	}
		                	if ($hotel['luggage'] == 1) { ?>
		                		<i class="fas fa-luggage-cart"></i>
		                	<?php 
		                	}
		                	if ($hotel['elevator'] == 1) { ?>
		                		<i class="fas fa-sort-numeric-up-alt"></i>
		                	<?php 
		                	}
		                	if ($hotel['sauna'] == 1) { ?>
		                		<i class="fas fa-hot-tub"></i>
		                	<?php 
		                	}
		                	?><br/>
		                </div>
		                <div class="div-rooms">
		                    <?= nl2br($hotel['rooms']); ?><br/>
		                </div>
		                <div class="div-prices">
		                    <?= nl2br($hotel['prices']); ?>
		                </div>
		            </div> 
	            </div><br/>

	            

				<div id="div-opinions">
							<!-- Si on est connecté, on affiche le formulaire d'ajout d'avis -->
					  <?php if (isset($_SESSION['id'])) { ?> 
								<form id="form-add-opinion" action="index.php?action=addHotelOpinion&amp;id=<?= $hotel['id'] ?>" method="post">
									<h3>Ajouter un avis</h3>
								    <div>
								        <label for="content"></label><br /><textarea name="content"></textarea>
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
						<?php	while ($opinion = $opinionsHotel->fetch()) { ?>
								<div id="one-opinion">
								    <h4>
								    	<p><strong><?= htmlspecialchars($opinion['pseudo']) ?></strong> le <?= $opinion['opinion_date_fr'] ?></p> <!-- On récupère le pseudo et la date de l'avis -->
								    </h4>

								    <p>
								    	<?= nl2br(($opinion['content'])) ?> <!-- On récupère le contenu de l'avis -->
								    </p>
								

							 <?php 	if (isset($_SESSION['id'])) { ?> <!-- Si on est connecté, on affiche le lien signaler -->
										<div>
									    	<a id="button-report" href="index.php?action=validReportHotel&amp;id=<?= $_GET['id'] ?>&amp;id_hotel=<?= $opinion['id']?>">Signaler</a>
									    	<a id="button-useful" href="index.php?action=validUsefulHotel&amp;id=<?= $_GET['id'] ?>&amp;id_hotel=<?= $opinion['id']?>">Utile<i class="far fa-thumbs-up"></i></a>
									    </div>
							 <?php 	} ?>	

								</div>
					<?php   } 
							$opinionsHotel->closeCursor(); ?>					
					</div>

				</div>
			</div>
		</div>
	</div>
</body>




<?php $content = ob_get_clean();

require('app/view/template.php'); ?>
