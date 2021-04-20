<?php $title = "Connexion"; 

ob_start(); ?>

<body id="body-signup"> 
	<div class="container">
		<div class="row form-connexion">
			<div class="col">
				<h2>SE CONNECTER</h2>
					<form action="index.php?action=validSignin" method="post">
					    <label for="pseudo">Nom / Pseudo </label><input type="text" name="pseudo" required class="input-signin" /><br/>
					    <label for="pass">Mot de passe </label><input type="password" name="pass" required class="input-signin"/><br/>
					    <input type="submit" name="signin" value="SE CONNECTER" id="button_confirm_signin">
					</form>
			</div>
		</div>
	</div>
</body>

<?php $content = ob_get_clean(); 
require('app/view/template.php');
?>