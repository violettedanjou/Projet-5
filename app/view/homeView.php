<?php $title = 'Accueil'; ?>

<?php ob_start(); ?>
<div id="banner1"></div>
<h1 id="h1-accueil">DECOUVERTE DE LA NOUVELLE CALEDONIE</h1>

<section>
    <div class="container">
        <div class="row">
            <div class="col">
                <p class="p-legend">La Nouvelle-Calédonie, île française située dans le pacifique à plus de 17 000km de Paris offre un cadre paradisiaque avec le plus grand lagon du monde inscrit au patrimoine mondiale de l’UNESCO. Cet archipel regorge de plages de sable blanc et d‘animaux en tout genre avec l’ensemble de ses cétacés comprenant baleines, dauphins mais aussi raie manta, tortues et bien d’autres encore… Terre de partage, les différentes cultures de la nouvelle Calédonie font partie intégrante de l’ile avec notamment avec la culture kanak et ses nombreuses coutumes et traditions. Un véritable voyage vous attends au bout du monde… </p>

                <p class="p-legend">Retrouvez sur notre site l’ensemble des activités à réaliser sur la Grande Terre ou sur les îles Loyauté. De nombreuses activités vous attendent pour vivre pleinement votre voyage entre activités sportives et culturelles comme kitesurf, les balades à cheval, les musées ou encore le shopping au centre de la capitale de Nouméa.</p>
            </div>
        </div>
    </div>
</section>

<section id="section-activities-hotels">
    <div class="container" id="block-activities">
        <div class="row">
            <div class="col">
                <h1>VIVRE LA NOUVELLE CALEDONIE</h1>
                <?php
                while ($data = $activities->fetch())
                {
                ?>
                    <div class="news">
                        <a href="index.php?action=activity&amp;id=<?= $data['id'] ?>">
                            <img class="img-home" src="<?= $data['picture'] ?>" alt="Photo de l'activite <?= $data['title'] ?>">
                        </a>
                        <div class="news-text">
                            <h3>
                                <a href="index.php?action=activity&amp;id=<?= $data['id'] ?>">
                                    <?= htmlspecialchars($data['title']) ?>
                                    <br/>
                                </a>
                            </h3>
                            <p><?= nl2br(($data['content'])) ?></p>
                               
                            <em class="link-opinions"><a href="index.php?action=activity&amp;id=<?= $data['id'] ?>">Avis</a></em>
                        </div>
                    </div>
                <?php
                }
                $activities->closeCursor(); ?> 
            </div>
        </div>
    </div>

    <div class="container" id="block-hotels">
        <div class="row">
            <div class="col">
                <h1>SE LOGER SUR L'ILE</h1>
                <?php
                while ($dataHotel = $hotels->fetch())
                {
                ?>
                    <div class="news">
                        <a href="index.php?action=hotel&amp;id=<?= $dataHotel['id'] ?>">
                            <img class="img-home" src="<?= $dataHotel['picture'] ?>" alt="Photo de l'hotel <?= $dataHotel['name'] ?>">
                        </a>
                        <div class="news-text">
                            <h3>
                                <a href="index.php?action=hotel&amp;id=<?= $dataHotel['id'] ?>">
                                    <?= htmlspecialchars($dataHotel['name']) ?>
                                    <br/>
                                </a>
                            </h3>
                            <p><?= nl2br(($dataHotel['content'])) ?></p>
                               
                            <em class="link-opinions"><a href="index.php?action=hotel&amp;id=<?= $dataHotel['id'] ?>">Avis</a></em>
                        </div>
                    </div>
                <?php
                }
                $hotels->closeCursor(); ?>                
            </div>
        </div>
    </div>
</section>



<?php $content = ob_get_clean();
require('app/view/template.php'); ?>