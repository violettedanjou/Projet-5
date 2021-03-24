<?php 
namespace app\controller;

require "vendor/autoload.php";
use app\model\MemberManager;
use app\model\ActivitiesManager;
use app\model\HotelsManager;
use app\model\OpinionsManager;
use app\model\WeatherManager;

class controller_back
{
	function insert() // Insérer un nouveau membre
	{
		$memberManager = new MemberManager();
		$pseudoExist = $memberManager->verifyPseudo($_POST['pseudo']);
    
		$nbrResult = $pseudoExist->rowCount();
		if ($nbrResult == 0) {
		    $memberManager = new MemberManager();
		    $newMember = $memberManager->insertMember($_POST['pseudo'], $_POST['pass'], $_POST['email']);
		    header('Location: index.php');	
		}
		else {
			throw new Exception("Le pseudo est déjà utilisé. Essayez autre chose.", 1);
		}
	}
	function connect() // Connecter un membre déjà inscrit 
	{
	    $memberManager = new MemberManager();
	    $connect = $memberManager->connectMember($_POST['pseudo']);
	    
	    $nbrResult = $connect->rowCount();
	    if ($nbrResult == 1) {
	    	$user = $connect->fetch();
	    	$pass_hache = $user['pass'];
	    	if (password_verify($_POST['pass'], $pass_hache)) {
	    		$_SESSION['id'] = $user['id'];
	        	$_SESSION['pseudo'] = $_POST['pseudo'];
	        	$_SESSION['admin'] = $user['admin'];
	       		header('Location: index.php');
	    	}
	    	else {
	    		throw new Exception("Mauvais mot de passe. Veuillez réessayer.", 1);
	    	}
	    }
	    else {
	    	throw new Exception("L'utilisateur n'existe pas.", 1);	
	    }
	    header('Location: index.php');
	}
	function signout() // Déconnecter un membre avec suppression des variables de session et de la session
	{
		$_SESSION = array(); 
		session_destroy();
		header('Location: index.php');
	}
	function validProfile($destinationFile) // Ajouter une image à son profile
	{
		$profileManager = new MemberManager();
		$profile = $profileManager->addPicture($_SESSION['id'], $destinationFile);

		header('Location: index.php?action=openProfile');
	}


	function reportActivity() // Signaler un avis d'activité
	{
		$reportManager = new OpinionsManager();
		$report = $reportManager->reportActivity($_GET['id_activity']);

		header('Location: index.php?action=activity&id='. $_GET['id']);
	}
	function usefulActivity() // Avis utile d'activité
	{
		$usefulManager = new OpinionsManager();
		$useful = $usefulManager->usefulActivity($_GET['id_activity']);

		header('Location: index.php?action=activity&id='. $_GET['id']);
	}
	function reportHotel() // Signaler un avis d'activité
	{
		$reportManager = new OpinionsManager();
		$report = $reportManager->reportHotel($_GET['id_hotel']);

		header('Location: index.php?action=hotel&id='. $_GET['id']);
	}
	function usefulHotel() // Avis utile d'activité
	{
		$usefulManager = new OpinionsManager();
		$useful = $usefulManager->usefulHotel($_GET['id_hotel']);

		header('Location: index.php?action=hotel&id='. $_GET['id']);
	}




																			
																			// PAGE ADMINISTRATION 

// AJOUT	
	function addActivity($destinationFile) // Ajouter une nouvelle activité
	{
		$newActivityManager = new ActivitiesManager();
		$newActivity = $newActivityManager->addNewActivity($_POST['title'], $_POST['content'], $destinationFile);

		header('Location: index.php?action=openAdmin');
	}
/*	Ajouter la météo à une nouvelle activité
	function addGoodWeather() // Passer la bonne météo à 1
	{
		$addWeatherManager = new ActivitiesManager();
		$good = $addWeatherManager->addGoodWeather($_GET['id']);

		header('Location: index.php?action=openNewActivity');
	}
	function addBadWeather() // Passer la mauvaise météo à 1
	{
		$addWeatherManager = new ActivitiesManager();
		$bad = $addWeatherManager->addBadWeather($_GET['id']);

		header('Location: index.php?action=openNewActivity');
	}
*/
	function addHotel($destinationFile) // Ajouter un nouvel hotel
	{
		$newHotelManager = new HotelsManager();
		$newHotel = $newHotelManager->addNewHotel($_POST['name'], $_POST['content'], $_POST['location'], $_POST['rooms'], $_POST['prices'], $destinationFile);

		header('Location: index.php?action=openAdmin');
	}	
// $_POST['swimming_pool'], $_POST['beach_access'], $_POST['car_park'], $_POST['free_wifi'], $_POST['restaurant'], $_POST['family_rooms'], $_POST['television'], $_POST['airport_shuttle'], $_POST['air_conditioner'], $_POST['no_smokers'], $_POST['animals'], $_POST['strongbox'], $_POST['mini_bar'], $_POST['luggage'], $_POST['elevator'], $_POST['sauna'],


/* $_GET['swimming_pool'], $_GET['beach_access'], $_GET['car_park'], $_GET['free_wifi'], $_GET['restaurant'], $_GET['family_rooms'], $_GET['television'], $_GET['airport_shuttle'], $_GET['air_conditioner'], $_GET['no_smokers'], $_GET['animals'], $_GET['strongbox'], $_GET['mini_bar'], $_GET['luggage'], $_GET['elevator'], $_GET['sauna'] */

/* $swimming_pool, $beach_access, $car_park, $free_wifi, $restaurant, $family_rooms, $television, $airport_shuttle, $air_conditioner, $no_smokers, $animals, $strongbox, $mini_bar, $luggage, $elevator, $sauna, */


// MODIFICATION
	function changeActivity() // Modification d'une activité
	{
		$saveManager = new ActivitiesManager();
		$save = $saveManager->saveActivity($_POST['id'], $_POST['title'], $_POST['content']);

		header('Location: index.php?action=openAdmin');
	}
	function changeImgActivity($destinationFile)
	{
		$imgActivityManager = new ActivitiesManager();
		$imgManager = $imgActivityManager->changeImgActivity($_SESSION['admin'], $destinationFile);// J'ai voulu faire comme pour l'image de profile pour le $_SESSION['admin']

		header('Location: index.php?action=openAdmin');
	}
	function goodWeather() // Passer la bonne météo à 1
	{
		$goodWeatherManager = new ActivitiesManager();
		$good = $goodWeatherManager->goodWeather($_GET['id']);

		header('Location: index.php?action=openAdmin');
	}
	function badWeather() // Passer la mauvaise météo à 1
	{
		$badWeatherManager = new ActivitiesManager();
		$bad = $badWeatherManager->badWeather($_GET['id']);

		header('Location: index.php?action=openAdmin');
	}

	function changeHotel() // Modification d'un hotel
	{
		$saveManager = new HotelsManager();
		$save = $saveManager->saveHotel($_POST['id'], $_POST['name'], $_POST['content'], $_POST['location'], $_POST['rooms'], $_POST['prices']);

		header('Location: index.php?action=openAdmin');
	}

// GESTION SIGNALEMENTS ET AVIS UTILES
	function deleteReport() // Retirer le signalement
	{
		$removeManager = new OpinionsManager();
	    $remove = $removeManager->removeReport($_GET['id']);

		header('Location: index.php?action=openAdmin');
	}

	function deleteOpinion() // Supprimer un avis signalé
	{
		$deleteManager = new OpinionsManager();
	    $delete = $deleteManager->eliminateOpinion($_GET['id']);

		header('Location: index.php?action=openAdmin');
	}
}
?>















