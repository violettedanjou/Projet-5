<?php $title = "Connexion"; 

ob_start(); ?>

<div id="form-connexion">
	<h1>SE CONNECTER</h1>
	<form action="index.php?action=validSignin" method="post">
	    <label for="pseudo">Nom / Pseudo </label><input type="text" name="pseudo" required class="input-signin" /><br/>
	    <label for="pass">Mot de passe </label><input type="password" name="pass" required class="input-signin"/><br/>
	    <input type="submit" name="signin" value="SE CONNECTER" id="button_signin">
	</form>
</div>

<?php $content = ob_get_clean(); 
require('template.php');
?>