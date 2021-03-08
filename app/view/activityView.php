<?php $title = htmlspecialchars($activity['title']); 

ob_start(); ?>

<h1><?= htmlspecialchars($activity['title']) ?></h1>

<div class="news">    
	<?= $activity['picture'] ?>
    <?=	nl2br(($activity['content'])) ?>
</div>

<div id="div-opinions">
	<h2>AVIS</h2>
	<!-- Commentaires affichés même non connecté -->
	<?php	while ($opinion = $opinions->fetch()) { ?>
				<div id="news">
				    <h4>
				    	<p><strong><?= htmlspecialchars($opinion['pseudo']) ?></strong> le <?= $opinion['opinion_date_fr'] ?></p> <!-- On récupère le pseudo et la date de l'avis -->
				    </h4>

				    <p>
				    	<?= nl2br(($opinion['content'])) ?> <!-- On récupère le contenu de l'avis -->
				    </p>
				

			 <?php 	if (isset($_SESSION['id'])) { ?> <!-- Si on est connecté, on affiche le lien signaler -->
						<div class="button-report">
					    	<a  href="index.php?action=validReport&amp;id=<?= $opinion['id'] ?>&amp;opinion_id=<?= $opinion['id']?>">Signaler</a>
					    </div>
			 <?php 	} ?>	

				</div>
	<?php   } 
		$opinions->closeCursor();

	/* Si on est connecté, on affiche le formulaire d'ajout d'avis */
	if (isset($_SESSION['id'])) { ?> 
		<form action="index.php?action=addOpinion&amp;id=<?= $activity['id'] ?>" method="post">
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
			<div id="form-session-opinions"> <!-- Les mettre l'un à côté de l'autre grace au CSS qd j'aurais la page sous les yeux -->
				<h2>S'INSCRIRE</h2>
					<form action="index.php?action=validSignup" method="post">
						<label for="pseudo">Nom / Pseudo </label><input type="text" name="pseudo" class="input-signup" /><br/>
						<label for="pass">Mot de passe </label><input type="password" name="pass" class="input-signup"/><br/>
						<label for="pass_confirm">Confirmation du mot de passe </label><input type="password" name="pass_confirm" class="input-signup"/><br/>
						<label for="email">Adresse email </label><input type="email" name="email"  class="input-signup" style="width: 250px"/><br/>
						<input type="submit" name="signup" value="S'INSCRIRE" id="button_confirm_signup">
					</form>

				<h2>SE CONNECTER</h2>
					<form action="index.php?action=validSignin" method="post">
					    <label for="pseudo">Nom / Pseudo </label><input type="text" name="pseudo" required class="input-signin" /><br/>
					    <label for="pass">Mot de passe </label><input type="password" name="pass" required class="input-signin"/><br/>
					    <input type="submit" name="signin" value="SE CONNECTER" id="button_confirm_signin">
					</form>
			</div>		
<?php	} ?>
</div>

<?php $content = ob_get_clean();

require('app/view/template.php'); ?>
