<?php $title = "Profil"; ?>

<?php ob_start(); ?>

<body id="body-profile">
	<div class="container">
		<div class="row profile-form">
			<div class="col">
				<h2>PROFILE</h2>
					<div id="block-profile">
						<p><span id="span-profile">NOM : </span><?= htmlspecialchars_decode($_SESSION['pseudo'])?></p>

						<?php $profile = $profileManager->fetch(); ?>
							<img id="img-profile" src="<?= $profile['picture']?>" alt="Image de profile">

						<form id="form-profile" action="index.php?action=validProfile" method="post" enctype="multipart/form-data">
							<input type="file" name="pictureProfile">
							<input type="submit" name="profile" value="Modifier" id="button_profile_picture">
						</form>
					</div>
			</div>
		</div>
	</div>
</body>

<?php $content = ob_get_clean(); 
require('app/view/template.php'); ?>