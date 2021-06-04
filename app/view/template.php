<!DOCTYPE html>
<html lang="fr-fr">
<head>
	<meta charset="utf-8"/>

	<link rel= "preconnect" href="https://fonts.gstatic.com"> <!-- Police -->
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Single+Day&display=swap" rel="stylesheet"> 

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css"> <!-- Icones -->

	<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> <!-- Tinymce -->

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> <!-- Bootstrap -->

	<meta name="viewport" content="width=device-width"> <!-- Meta tags -->
	<meta property="og:site_name" content="Site de l'office de tourisme de Nouvelle Calédonie">
	<meta property="og:image" content="https://cdn.pixabay.com/photo/2017/06/08/11/01/south-sea-2383322_1280.jpg">
	<meta name="author" content="Violette Danjou">
	<meta name="subject" content="Office de Tourisme (fictif) - Nouvelle Calédonie">
	<meta name="description" content="Retrouvez toutes les activités et les hôtels de la Nouvelle-Calédonie. Vivez une aventure exceptionnelle au coeur du Pacifique.">

	<link href="app/public/style.css" rel="stylesheet"/> <!-- CSS -->

	<link rel="stylesheet" type="text/css" media="all and (max-width: 576px)" href="app/public/responsive.css"> <!-- Responsive pour smartphone-->
	<title><?= $title ?></title>
</head>

<body>
    <div class="wrap">
        <header>
		    	<div id="div-logo">
		    		<a href="index.php">
		    			<img id="logo" src="app/public/pictures/logo.png" alt="Logo de l'emblème de la Nlle-Calédonie">
						<p id="p-logo">La Caledonienne <br/>
						<span id="span-logo">Office de tourisme <br/> (Fictif) </span></p>
					</a>
				</div>
					
				<nav id="nav-header">
					<ul>
						<?php 
						if(isset($_SESSION['pseudo'])) : ?>
							<li id="button_profile"><a class="a-session" href="index.php?action=openProfile">COMPTE</a></li>	
							<li id="button_signout"><a class="a-session" href="index.php?action=validSignout">DECONNEXION</a></li>	

							<?php 	
							if($_SESSION['admin'] != 0) : ?>
								<li id="button_admin"><a class="a-session" href="index.php?action=openAdmin">ADMINISTRATION</a></li>
							<?php 	
							endif;
						;
						
						else : ?> 
							<li id="button_signup"><a class="a-session" href="index.php?action=openSignup">S'INSCRIRE</a></li>
							<li id="button_signin"><a class="a-session" href="index.php?action=openSignin">SE CONNECTER</a></li>
						<?php 
						endif;
						?>
					</ul>
				</nav>
		</header>
		
	   	<?= $content ?>
    </div>

<footer>
    <p> Copyright © Violette Danjou - 2021. Tous droits réservés</p>
</footer>

   <script>tinymce.init({selector:'textarea'});</script>
</body>
</html>