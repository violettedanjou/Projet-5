<?php $title = "Inscription";

ob_start(); ?>

<div id="signup-form">
	<h1>S'INSCRIRE</h1>
	<form action="index.php?action=validSignup" method="post">
		<label for="pseudo">Nom / Pseudo </label><input type="text" name="pseudo" class="input-signup" /><br/>
		<label for="pass">Mot de passe </label><input type="password" name="pass" class="input-signup"/><br/>
		<label for="pass_confirm">Confirmation du mot de passe </label><input type="password" name="pass_confirm" class="input-signup"/><br/>
		<label for="email">Adresse email :</label><input type="email" name="email"  class="input-signup"/><br/>
		<input type="submit" name="signup" value="S'INSCRIRE" id="button_signup">
	</form>
</div>
<?php $content = ob_get_clean(); 
require('template.php');