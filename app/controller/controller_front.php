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
	    $activityManager = new ActivitiesManager();
	    $activities = $activityManager->getActivities();

	    $hotelManager = new HotelsManager();
	    $hotels = $hotelManager->getHotels();

	    require('app/view/homeView.php');
	}
	function activity() // Afficher une activité en particulier
	{
	    $activityManager = new ActivitiesManager();
	    $opinionManager = new OpinionsManager();

	    $activity = $activityManager->getActivity($_GET['id']);
	    $opinions = $opinionManager->pseudoAuthor($_GET['id']);

	    require('app/view/activityView.php');
	}
	function hotel() // Afficher un hotel selon son id
	{
	    $hotelManager = new HotelsManager();
	    $opinionManager = new OpinionsManager();

	    $hotel = $hotelManager->getHotel($_GET['id']);
	    $opinions = $opinionManager->pseudoAuthor($_GET['id']);

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
		require('app/view/profileView.php');
	}
	function validProfile() // Ajouter une image à son profile
	{
		$profileManager = new MemberManager();
		$profile = $profileManager->addPicture($_FILES['pictureProfile']['name'], $_SESSION['id']);

		header('Location: index.php?action=openProfile');
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