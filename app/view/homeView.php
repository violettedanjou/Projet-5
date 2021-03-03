<?php $title = 'Accueil'; ?>

<?php ob_start(); ?>
<div id="banner"></div>
<h1 id="h1-accueil">DÉCOUVERTE DE LA NOUVELLE CALÉDONIE</h1>



<?php $content = ob_get_clean();
require('app/view/template.php'); ?>