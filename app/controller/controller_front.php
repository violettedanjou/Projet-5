<?php 
namespace app\controller;

require "vendor/autoload.php";
use app\model\MemberManager;
use app\model\ActivitiesManager;
use app\model\HotelsManager;
use app\model\OpinionsManager;

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

	function listActivitiesHotels() // Afficher la liste des activités et des hôtels
	{
	    
	   	$currentPage = (int) strip_tags($_GET['page']); // La fonction strip_tags() supprime les balises HTML et PHP d'une chaîne

	    $activitiesManager = new ActivitiesManager();
	    $allActivities = $activitiesManager->allActivities();
	    $nbrActivities = $allActivities->fetch(); // On récupère le nombre d'activités (1)
	    $nbr = (int) $nbrActivities['nbrActivities']; // On récupère le nombre d'activités (2)

	   	$activitiesOfPage = 2; // On détermine le nombre d'activité par page 
	    $pages = ceil($nbr / $activitiesOfPage); // Calcul du nombre de pages totales / Fonction ceil() arrondi au nombre supérieur
	   	$firstActivity = ($currentPage * $activitiesOfPage) - $activitiesOfPage; // Calcul de la première activité de la page 

	    $activityManager = new ActivitiesManager();
	    $activities = $activityManager->getActivities($firstActivity, $activitiesOfPage);
	    $arrayActivities = $activities->fetchAll(\PDO::FETCH_ASSOC); // On récupère les valeurs dans un tableau associatif 








		$hotelManager = new HotelsManager();
	    $hotels = $hotelManager->getHotels();

	    require('app/view/homeView.php');    
	}


	    /*$allActivitiesOfPage = new ActivitiesManager();
	    $allActivities = $allActivitiesOfPage->allActivities();

	    //$activitiesOfPage = 2;
	    $nbrActivities = $allActivities->rowCount();
	    if (isset($_GET['page']) AND !empty($_GET['page'])) {
	    	$_GET['page'] = intval($_GET['page']); // sécurité : intval() pour éviter que les utilisateurs mettent autre choses qu'un nombre
	    	$homePage = $_GET['page'];
	    }
	    else {
	    	$homePage = 1; // si cette page n'est pas définie ou alors qu'elle ne contient rien alors on se retrouve sur la premier page 
	    }*/

	    //$depart = ($homePage-1)*$activitiesOfPage;



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
		$profileManager = $imgProfileManager->openImg($_SESSION['id']);

		require('app/view/profileView.php');
	}





// PAGE ADMINISTRATION
	function openAdmin() // Afficher la page d'administrateur
	{
		$activityManager = new ActivitiesManager(); 
	    $activities = $activityManager->getActivities();

	    $hotelManager = new HotelsManager(); 
	    $hotels = $hotelManager->getHotels();

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
	    $change = $changeManager->changeActivity($_GET['id']);

	    require('app/view/changeActivityView.php');
	}


	function openNewHotel() // Afficher formulaire pour ajout de nouvel hotel
	{
		require('app/view/additionHotelView.php');
	}

	function openChangeHotel() // Récupération d'un hotel pour le modifier
	{
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