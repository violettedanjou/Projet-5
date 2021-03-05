<?php $title = 'Accueil'; ?>

<?php ob_start(); ?>
<div id="banner1"></div>
<h1 id="h1-accueil">DECOUVERTE DE LA NOUVELLE CALEDONIE</h1>

<div class="container">
    <div class="row">
        <div class="col">
            <p class="p-legend">Texte pour histoire de la nouvelle Calédonie : La Nouvelle-Calédonie, île française située dans le pacifique à plus de 17 000km de Paris offrant un cadre paradisiaque avec le plus grand lagon du monde inscrit au patrimoine mondiale de l’UNESCO. Cet archipel regorge de plages de sable blanc et d‘animaux en tout genre avec l’ensemble de ses cétacés comprenant baleines, dauphins mais aussi raie manta, tortues et bien d’autres encore… Terre de partage, les différentes cultures de la nouvelle Calédonie font partie intégrante de l’ile avec notamment avec la culture kanak et ses nombreuses coutumes et traditions. Un véritable voyage vous attends au bout du monde… </p>

            <p class="p-legend">Retrouvez sur notre site l’ensemble des activités à réaliser sur la Grande Terre ou sur les îles Loyauté. De nombreuses activités vous attendent pour vivre pleinement votre voyage entre activités sportives et culturelles comme kitesurf, les balades à cheval, les musées ou encore le shopping au centre de la capitale Nouméa.</p>
        </div>
    </div>
</div>







<?php $content = ob_get_clean();
require('app/view/template.php'); ?>