<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<link rel= "preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet"> <!-- Police -->

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css"> <!-- Icones -->

	<link href="app/public/style.css" rel="stylesheet" /> 
	<title><?= $title ?></title>
</head>
<body>
    <div class="wrap">
        <header>
		    	<div id="caledonia">
		    		<a href="index.php">
		    			<img src="app/public/pictures/logo.png" alt="Logo de l'emblème de la Nlle-Calédonie">
						La Calédonienne <br/>
						<span>Office de tourisme <br/> (Fictif) </span>
					</a>
				</div>
					
				<nav>
					<ul>
						<?php if(isset($_SESSION['pseudo'])) { ?>	
							<li class="li" id="button_deconnexion"><a href="index.php?action=validDeconnexion">DÉCONNEXION</a></li>
							<li class="li" id="button_profile"><a href="index.php?action=validProfile">COMPTE</a></li>

							<?php if($_SESSION['admin'] != 0) { ?>
								<li class="li" id="button_activities"><a href="index.php?action=adminActivites">ACTIVITÉS</a></li>
								<li class="li" id="button_hotels"><a href="index.php?action=adminHotels">HÔTELS</a></li>
								<li class="li" id="button_opinions"><a href="index.php?action=adminOpinions">AVIS</a></li>

								<!-- <li class="li" id="button_admin"><a href="index.php?action=afficheAdmin">AVIS</a></li>-->
							<?php }
						}
						
						else { 
						?> 
							<li class="li" id="button_signup"><a href="index.php?action=afficheSignup">CRÉER UN COMPTE</a></li>
							<li class="li" id="button_signin"><a href="index.php?action=afficheSignin">CONNEXION</a></li>
						<?php }?>
					</ul>
				</nav>
		</header>
			
	   	<?= $content ?>
    </div>

	<footer>
    	<p> Copyright © Violette Danjou - 2021. Tous droits réservés</p>
    </footer>
</body>
</html>