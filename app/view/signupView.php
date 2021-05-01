<?php $title = "Inscription";

ob_start(); ?>

<body id="body-signup">
	<div class="container">
		<div class="row signup-form">
			<div class="col">
				<h2>S'INSCRIRE</h2>
					<form action="index.php?action=validSignup" method="post">
						<label for="pseudo">Nom / Pseudo </label><input type="text" name="pseudo" class="input-signup" minlength="5" /><br/>
						<label for="pass">Mot de passe </label><input type="password" name="pass" class="input-signup"minlength="4"/><br/>
						<label for="pass_confirm">Confirmation du mot de passe </label><input type="password" name="pass_confirm" class="input-signup" minlength="4"/><br/>
						<label for="email">Adresse email </label><input type="email" name="email"  class="input-signup" style="width: 230px"/><br/>
						<input type="submit" name="signup" value="S'INSCRIRE" id="button_confirm_signup">
					</form>
			</div>
		</div>
	</div>
</body>

<?php $content = ob_get_clean(); 
require('app/view/template.php'); ?>