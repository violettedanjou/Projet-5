<?php 
namespace app\controller;

require "vendor/autoload.php";
use app\model\MemberManager;
use app\model\ActivitiesManager;
use app\model\HotelsManager;
use app\model\OpinionsManager;
use app\model\WeatherManager;

class controller_front
{
	function openSignup() // Afficher le formulaire d'inscription
	{
		require('app/view/signupView.php');
	}

	function openSignin() // Afficher le formulaire de connexion
	{
		require('app/view/signinView.php');
	}

	function listActivitiesHotels($currentPage/*, $currentPageWeather*/) // Afficher la liste des activités et des hôtels
	{
	    
		// RECUPERER LES ACTIVITES + LA PAGINATION
	    $activitiesManager = new ActivitiesManager();
	    $allActivities = $activitiesManager->allActivities();
	    $nbrActivities = $allActivities->fetch(); // On récupère le nombre d'activités (1)
	    $nbr = (int) $nbrActivities['nbrActivities']; // On récupère le nombre d'activités (2)

	   	$activitiesOfPage = 4; // On détermine le nombre d'activité par page 
	    $pages = ceil($nbr / $activitiesOfPage); // Calcul du nombre de pages totales / Fonction ceil() arrondi au nombre supérieur
	   	$start = ($currentPage-1)*$activitiesOfPage; // Calcul de la première activité de la page 

	    $activityManager = new ActivitiesManager();
	    $activities = $activityManager->getActivities($start, $activitiesOfPage);
	   

	    // METEO + PAGINATION
/*	    $weatherManager = new ActivitiesManager();
	    $allActivitiesWeather = $weatherManager->allActivitiesWeather();
	    $nbrActivitiesWeather = $allActivitiesWeather->fetch(); // On récupère le nombre d'activités (1)
	    $nbrWeather = (int) $nbrActivitiesWeather['nbrActivitiesWeather']; // On récupère le nombre d'activités (2)

	    $paginationWeather = 2; // On détermine le nombre d'activité par page 
	    $pages = ceil($nbrWeather / $paginationWeather); // Calcul du nombre de pages totales / Fonction ceil() arrondi au nombre supérieur
	   	$startWeather = ($currentPageWeather-1)*$paginationWeather; // Calcul de la première activité de la page
*/
		$displayManager = new ActivitiesManager(); // Afficher la météo et son activité
		$display = $displayManager->displayWeather(/*$startWeather, $paginationWeather*/);

		$url = "http://api.openweathermap.org/data/2.5/weather?q=noumea&lang=fr&appid=eea2c52399d4972988c3afb0252aca33";
		$contents = file_get_contents($url); // Récupérer le contenu de l'API
		$json = json_decode($contents); // json_decode() Décode une chaine JSON

		$id = $json->weather[0]->id;
		$icon = $json->weather[0]->icon;

		// RECUPERER LES HOTELS 
		$hotelsManager = new HotelsManager();
	    $allHotels = $hotelsManager->allHotels();
	    $nbrHotels = $allHotels->fetch(); // On récupère le nombre d'activités (1)
	    $nbr = (int) $nbrHotels['nbrHotels']; // On récupère le nombre d'activités (2)

	   	$hotelsOfPage = 4; // On détermine le nombre d'activité par page 
	    $pages = ceil($nbr / $hotelsOfPage); // Calcul du nombre de pages totales / Fonction ceil() arrondi au nombre supérieur
	   	$start = ($currentPage-1)*$hotelsOfPage; // Calcul de la première activité de la page 

		$hotelManager = new HotelsManager();
	    $hotels = $hotelManager->getHotels($start, $hotelsOfPage);

	    require('app/view/homeView.php');    
	}





/* TEST POUR LA METEO 	
	function openWeather()
	{
		$displayManager = new ActivitiesManager();
		$display = $displayManager->displayWeather();

		$url = "http://api.openweathermap.org/data/2.5/weather?q=noumea&lang=fr&appid=eea2c52399d4972988c3afb0252aca33";
		$contents = file_get_contents($url); // Récupérer le contenu de l'API
		$json = json_decode($contents); // json_decode() Décode une chaine JSON
		//print_r($json); // Afficher des infos lisibles pour une variable


		$icon = $json->weather[0]->icon;
		$main = $json->weather[0]->main;
		$desc = $json->weather[0]->description;
		$temp_max = $json->main->temp_max;
		$temps_min = $json->main->temp_min;
	}

*/







	function activity() // Afficher une activité en particulier
	{
	    $activityManager = new ActivitiesManager();
	    $activity = $activityManager->getActivity($_GET['id']);

	    $opinionManager = new OpinionsManager();
	    $opinionsActivity = $opinionManager->pseudoAuthorActivity($_GET['id']);

	    require('app/view/activityView.php');
	}
	function hotel() // Afficher un hotel selon son id
	{
	    $hotelManager = new HotelsManager();
	    $hotel = $hotelManager->getHotel($_GET['id']);

	    /*$servicesManager = new HotelsManager();
	    $services = $servicesManager->getServices($_GET['id']);*/

	    $opinionManager = new OpinionsManager();
	    $opinionsHotel = $opinionManager->pseudoAuthorHotel($_GET['id']);

	    require('app/view/hotelView.php');
	}

	function addActivityOpinion($id, $content) // Ajouter un avis
	{
	    $opinionManager = new OpinionsManager();
	    $affectedLines = $opinionManager->activityOpinion($id, $content);

	    if ($affectedLines === false) {
	        throw new Exception('Impossible d\'ajouter le commentaire !');
	    }
	    else {
	        header('Location: index.php?action=activity&id=' . $id);
	    }	    
	}
	function addHotelOpinion($id, $content) // Ajouter un avis
	{
	    $opinionManager = new OpinionsManager();
	    $affectedLines = $opinionManager->hotelOpinion($id, $content);

	    if ($affectedLines === false) {
	        throw new Exception('Impossible d\'ajouter le commentaire !');
	    }
	    else {
	        header('Location: index.php?action=hotel&id=' . $id);
	    }	    
	}	
	function openProfile()
	{
		$imgProfileManager = new MemberManager();
		$profileManager = $imgProfileManager->openImg($_SESSION['id']/*, $_SESSION['picture']*/);

		require('app/view/profileView.php');
	}





// PAGE ADMINISTRATION
	function openAdmin($currentPage) // Afficher la page d'administrateur
	{
		$activitiesManager = new ActivitiesManager();
	    $allActivities = $activitiesManager->allActivities();
	    $nbrActivities = $allActivities->fetch(); // On récupère le nombre d'activités (1)
	    $nbr = (int) $nbrActivities['nbrActivities']; // On récupère le nombre d'activités (2)

	   	$activitiesOfPage = 4; // On détermine le nombre d'activité par page 
	    $pages = ceil($nbr / $activitiesOfPage); // Calcul du nombre de pages totales / Fonction ceil() arrondi au nombre supérieur
	   	$start = ($currentPage-1)*$activitiesOfPage; // Calcul de la première activité de la page 

		$activityManager = new ActivitiesManager(); 
	    $activities = $activityManager->getActivities($start, $activitiesOfPage);


		// RECUPERER LES HOTELS 
		$hotelsManager = new HotelsManager();
	    $allHotels = $hotelsManager->allHotels();
	    $nbrHotels = $allHotels->fetch(); // On récupère le nombre d'activités (1)
	    $nbr = (int) $nbrHotels['nbrHotels']; // On récupère le nombre d'activités (2)

	   	$hotelsOfPage = 10; // On détermine le nombre d'activité par page 
	    $pages = ceil($nbr / $hotelsOfPage); // Calcul du nombre de pages totales / Fonction ceil() arrondi au nombre supérieur
	   	$start = ($currentPage-1)*$hotelsOfPage; // Calcul de la première activité de la page 
	    $hotelManager = new HotelsManager(); 
	    $hotels = $hotelManager->getHotels($start, $hotelsOfPage);

	    $adminManager = new OpinionsManager();
		$admin = $adminManager->reportAdmin();

		$adminUsefulManager = new OpinionsManager();
		$useful = $adminUsefulManager->usefulAdmin();

	    require('app/view/adminView.php');
	}


	function openNewActivity() // Afficher formulaire pour ajout de nouvelle activité
	{
		require('app/view/additionActivityView.php');
	}
	function openChangeActivity() // Récupération d'une activité pour la modifier
	{
		$changeManager = new ActivitiesManager();
	    $changeActivity = $changeManager->changeActivity($_GET['id']);

	    require('app/view/changeActivityView.php');
	}


	function openNewHotel() // Afficher formulaire pour ajout de nouvel hotel
	{
		require('app/view/additionHotelView.php');
	}

	function openChangeHotel() // Récupération d'un hotel pour le modifier
	{
		/*$hotelManager = new HotelsManager();
	    $hotel = $hotelManager->getHotel($_GET['id']);*/

		$changeManager = new HotelsManager();
	    $change = $changeManager->changeHotel($_GET['id']);

	    require('app/view/changeHotelView.php');
	}


	function deleteActivity() // Supprimer une activité 
	{
		$deleteActivityManager = new ActivitiesManager();
	    $deleteActivity = $deleteActivityManager->deleteActivity($_GET['id']);

		header('Location: index.php?action=openAdmin');
	}
	function deleteHotel() // Supprimer un hotel 
	{
	    $deleteHotelManager = new HotelsManager();
	    $deleteHotel = $deleteHotelManager->deleteHotel($_GET['id']);

		header('Location: index.php?action=openAdmin');
	}




}
?>