<?php $title = htmlspecialchars($post['title']); 

ob_start(); ?>

<h1><?= htmlspecialchars($post['title']) ?></h1>

<div class="news">    
	<?= $post['picture'] ?>
    <?=	nl2br(($post['content'])) ?>
</div>

<div id="div-opinions">
	<h2>AVIS</h2>
	<!-- Commentaires affichés même non connecté -->
	<?=	while ($opinion = $opinions->fetch()) { ?>
			<div id="news">
			    <h4>
			    	<p><strong><?= htmlspecialchars($opinion['pseudo']) ?></strong> le <?= $opinion['opinion_date_fr'] ?></p> <!-- On récupère le pseudo et la date de l'avis -->
			    </h4>

			    <p>
			    	<?= nl2br(($opinion['content'])) ?> <!-- On récupère le contenu de l'avis -->
			    </p>
			

		<?php 	if (isset($_SESSION['id'])) { ?> <!-- Si on est connecté, on affiche le lien signaler -->
					<div class="button-report">
				    	<a  href="index.php?action=validReport&amp;id=<?= $comment['id'] ?>&amp;post_id=<?= $post['id']?>">Signaler</a>
				    </div>
		<?php 	} ?>			
			</div>
	<?= } 

	/* Si on est connecté, on affiche le formulaire d'ajout d'avis */
	if (isset($_SESSION['id'])) { ?> 
		<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
		    <div>
		        <label for="comment"></label><br /><textarea id="comment" name="comment"></textarea>
		    </div>
			<div>
				<input type="submit" id="button_add_comment" />
			</div>
		</form>	
<?= }
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
<?=	} ?>
</div>

<?php $content = ob_get_clean();

require('app/view/template.php'); ?>
