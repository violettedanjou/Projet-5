<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<link rel= "preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Single+Day&display=swap" rel="stylesheet"> <!-- Police -->

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css"> <!-- Icones -->

	<link href="app/public/style.css" rel="stylesheet" /> 
	<title><?= $title ?></title>
</head>
<body>
    <div class="wrap">
        <header>
		    	<div id="div-logo">
		    		<a href="index.php">
		    			<img id="logo" src="app/public/pictures/logo.png" alt="Logo de l'emblème de la Nlle-Calédonie">
						<p id="p-logo">La Calédonienne <br/>
						<span id="span-logo">Office de tourisme <br/> (Fictif) </span></p>
					</a>
				</div>
					
				<nav>
					<ul>
						<?php if(isset($_SESSION['pseudo'])) { ?>	
							<li id="button_deconnexion"><a class="a-session" href="index.php?action=validSignout">DÉCONNEXION</a></li>
							<li id="button_profile"><a class="a-session" href="index.php?action=validProfile">COMPTE</a></li>

							<?php if($_SESSION['admin'] != 0) { ?>
								<li id="button_activities"><a class="a-session" href="index.php?action=adminActivites">ACTIVITÉS</a></li>
								<li id="button_hotels"><a class="a-session" href="index.php?action=adminHotels">HÔTELS</a></li>
								<li id="button_opinions"><a class="a-session" href="index.php?action=adminOpinions">AVIS</a></li>

								<!-- <li class="li" id="button_admin"><a href="index.php?action=afficheAdmin">AVIS</a></li>-->
							<?php }
						}
						
						else { 
						?> 
							<li id="button_signup"><a class="a-session" href="index.php?action=afficheSignup">S'INSCRIRE</a></li>
							<li id="button_signin"><a class="a-session" href="index.php?action=afficheSignin">SE CONNECTER</a></li>
						<?php }?>
					</ul>
				</nav>
		</header>
		
		<section id="banner">
			
		</section>

			
	   	<?php $content ?>
    </div>

	<footer>
    	<p> Copyright © Violette Danjou - 2021. Tous droits réservés</p>
    </footer>
</body>
</html>