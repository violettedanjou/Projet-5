<?php $title = 'Accueil'; ?>

<?php ob_start(); ?>
<div id="banner1"></div>
<h1 id="h1-home">DECOUVERTE DE LA NOUVELLE CALEDONIE</h1>

<section>
    <div class="container">
        <div class="row">
            <div class="col">
                <p class="p-legend">La Nouvelle-Calédonie, île française située dans le pacifique à plus de 17 000km de Paris offre un cadre paradisiaque avec le plus grand lagon du monde inscrit au patrimoine mondiale de l’UNESCO. Cet archipel regorge de plages de sable blanc et d‘animaux en tout genre avec l’ensemble de ses cétacés comprenant baleines, dauphins mais aussi raie manta, tortues et bien d’autres encore… Terre de partage, les différentes cultures de la Nxouvelle Calédonie font partie intégrante de l’ile avec notamment avec la culture kanak et ses nombreuses coutumes et traditions. Un véritable voyage vous attends au bout du monde… </p>

                <p class="p-legend">Retrouvez sur notre site l’ensemble des activités à réaliser sur la Grande Terre ou sur les îles Loyauté. De nombreuses activités vous attendent pour vivre pleinement votre voyage entre activités sportives et culturelles comme kitesurf, les balades à cheval, les musées ou encore le shopping au centre de la capitale de Nouméa.</p>
            </div>
        </div>
    </div>
</section>

<section id="section-activities-hotels">
    <div class="container" id="block-activities">
        <div class="row">
            <div class="col">
                <a href="index.php?action=listActivities">
                   <h2 class="titles-home">VIVRE LA NOUVELLE CALEDONIE</h2> 
                </a>

                    <div id="div-weather">
                        <h2>ACTIVITES DU JOUR : <img src="" alt="Météo du jour" id="icon-weather"> <!-- Pout afficher icon de la météo --></h2>
                            <div id="div-activity-weather">
                                <?php 
                                foreach($display as $dataWeather) :
                                ?>
                                    <div class="news">
                                        <div class="col-lg-6">
                                            <a href="index.php?action=activity&amp;id=<?= $dataWeather['id'] ?>">
                                                <img class="img-home" src="<?= $dataWeather['picture'] ?>" alt="Photo de l'activite <?= $dataWeather['title'] ?>">
                                            </a>
                                        </div>
                                        
                                        <div class="col-lg-6">
                                           <div class="news-text">
                                                <h3>
                                                    <a href="index.php?action=activity&amp;id=<?= $dataWeather['id'] ?>">
                                                        <?= htmlspecialchars_decode($dataWeather['title']) ; ?>
                                                        <br/>
                                                    </a>
                                                </h3>
                                                <p><?= nl2br(htmlspecialchars_decode($dataWeather['content'])) ?></p>
                                                               
                                                <em class="link-opinions"><a href="index.php?action=activity&amp;id=<?= $dataWeather['id'] ?>">Avis</a></em>
                                            </div> 
                                        </div>
                                        

                                    </div> 
                                <?php 
                                endforeach;
                                ?>
                                <script src="weather.js"></script>
                                <script src="main.js"></script> 

                                <nav> <!-- Pagination -->
                                    <ul class="pagination">
                                        <li class="page-item <?= ($currentPageWeather == 1) ? "disabled" : "" ?>">
                                            <a href="./?action=listActivitiesHotels&amp;page=<?= $currentPageWeather - 1 ?>" class="page-link">Precedente</a>
                                        </li>

                                        <?php for($page = 1; $page <= $pagesWeather; $page++): ?>
                                            <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                                            <li class="page-item <?= ($currentPageWeather == $page) ? "active" : "" ?>">
                                                <a href="./?action=listActivitiesHotels&amp;page=<?= $page ?>" class="page-link"><?= $page ?></a>
                                            </li>
                                        <?php endfor ?>

                                        <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                                        <li class="page-item <?= ($currentPageWeather == $pagesWeather) ? "disabled" : "" ?>">
                                            <a href="./?action=listActivitiesHotels&amp;page=<?= $currentPageWeather + 1 ?>" class="page-link">Suivante</a>
                                        </li>
                                    </ul>
                                </nav>                               
                            </div>    
                    </div>

                    <div>
                        <a href="index.php?action=listActivities"><h2 id="h2-home">LISTE COMPLETE DES ACTIVITES</h2></a>
                         <?php    
                        while ($data = $activities->fetch()) : ?>
                                <div class="news">
                                    <div class="col-lg-6">
                                       <a href="index.php?action=activity&amp;id=<?= $data['id'] ?>">
                                            <img class="img-home" src="<?= $data['picture'] ?>" alt="Photo de l'activite <?= $data['title'] ?>">
                                        </a> 
                                    </div>
                                    
                                    <div class="col-lg-6">
                                        <div class="news-text">
                                            <h3>
                                                <a href="index.php?action=activity&amp;id=<?= $data['id'] ?>">
                                                    <?= htmlspecialchars_decode($data['title']) ; ?>
                                                    <br/>
                                                </a>
                                            </h3>
                                            <div><?= nl2br(htmlspecialchars_decode($data['content'])) ?></div>
                                    </div>
                                           
                                        <em class="link-opinions"><a href="index.php?action=activity&amp;id=<?= $data['id'] ?>">Avis</a></em>
                                    </div>
                                </div>
                        <?php
                        endwhile; 
                        $activities->closeCursor(); ?>

                        <div id="listActivities">
                            <a class="link-list" href="index.php?action=listActivities">Acceder a la liste complete des activites<i class="fas fa-mouse-pointer"></i></a>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <div class="container" id="block-hotels">
        <div class="row">
            <div class="col">
                <a href="index.php?action=listHotels">
                    <h2 class="titles-home">SE LOGER SUR L'ILE</h2>  
                </a>
                <?php
                while ($dataHotel = $hotels->fetch()) : ?>
                    <div class="news">
                        <div class="col-lg-6">
                            <a href="index.php?action=hotel&amp;id=<?= $dataHotel['id'] ?>">
                                <img class="img-home" src="<?= $dataHotel['picture'] ?>" alt="Photo de l'hotel <?= $dataHotel['name'] ?>">
                            </a>
                        </div>

                        <div class="col-lg-6">
                            <div class="news-text">
                                <h3>
                                    <a href="index.php?action=hotel&amp;id=<?= $dataHotel['id'] ?>">
                                        <?= htmlspecialchars_decode($dataHotel['name']) ?>
                                        <br/>
                                    </a>
                                </h3>
                                <p><?= nl2br(htmlspecialchars_decode($dataHotel['content'])) ?></p>
                        </div>
                               
                            <em class="link-opinions"><a href="index.php?action=hotel&amp;id=<?= $dataHotel['id'] ?>">Avis</a></em>
                        </div>
                    </div>
                <?php
                endwhile;
                $hotels->closeCursor(); ?> 

                <div id="listHotels">
                    <a class="link-list" href="index.php?action=listHotels">Acceder a la liste complete des hotels<i class="fas fa-mouse-pointer"></i></a>
                </div>              
            </div>
        </div>
    </div>
</section>

<?php $content = ob_get_clean();
require('app/view/template.php'); ?>