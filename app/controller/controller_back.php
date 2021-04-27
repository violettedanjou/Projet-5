<?php 
namespace app\controller;

require "vendor/autoload.php";
use app\model\MemberManager;
use app\model\ActivitiesManager;
use app\model\HotelsManager;
use app\model\OpinionsManager;

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
		    header('Location: index.php?action=openSignin');	
		}
		else {
			throw new \Exception("Le pseudo est déjà utilisé. Essayez autre chose.", 1);
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
	    		throw new \Exception("Mauvais mot de passe. Veuillez réessayer.", 1);
	    	}
	    }
	    else {
	    	throw new \Exception("L'utilisateur n'existe pas.", 1);	
	    }
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
	function reportHotel() // Signaler un avis d'hôtel
	{
		$reportManager = new OpinionsManager();
		$report = $reportManager->reportHotel($_GET['id_hotel']);

		header('Location: index.php?action=hotel&id='. $_GET['id']);
	}
	function usefulHotel() // Avis utile d'hôtel
	{
		$usefulManager = new OpinionsManager();
		$useful = $usefulManager->usefulHotel($_GET['id_hotel']);

		header('Location: index.php?action=hotel&id='. $_GET['id']);
	}




																			
																			// PAGE ADMINISTRATION 

// AJOUT	
	function addActivity($destinationFile) // Ajouter une nouvelle activité
	{
 		$weather = $_POST['weather'];
		if (isset($_POST['weather']) && ($_POST['weather'] == "1")) {
			$weather = 1;
		}
		else {
			$weather = 0;
		}
		$newActivityManager = new ActivitiesManager();
		$newActivity = $newActivityManager->addNewActivity($_POST['title'], $_POST['content'], $weather, $destinationFile);

		header('Location: index.php?action=openActivitiesAdmin');
	}

	function addHotel($services, $destinationFile) // Ajouter un nouvel hotel
	{
		$newHotelManager = new HotelsManager();
		$newHotel = $newHotelManager->addNewHotel($_POST['name'], $_POST['content'], $_POST['location'], $_POST['rooms'], $_POST['prices'], $services, $destinationFile);

		header('Location: index.php?action=openHotelsAdmin');
	}	


// MODIFICATION
	// ACTIVITES 
	function changeActivity() // Modification d'une activité
	{
		$saveManager = new ActivitiesManager();
		$save = $saveManager->saveActivity($_POST['id'], $_POST['title'], $_POST['content']);

		header('Location: index.php?action=openActivitiesAdmin');
	}
	function changeImgActivity($id, $destinationFile)
	{
		$imgActivityManager = new ActivitiesManager();
		$imgManager = $imgActivityManager->changeImgActivity($id, $destinationFile);

		header('Location: index.php?action=openActivitiesAdmin');
	}
	function updateWeather() // Modifir la météo
	{
		$updateWeather = $_POST['weather'];
		
		if (isset($_POST['weather']) && ($_POST['weather'] == "1")) { // Bonne météo
			$updateWeather = 1;
			$updateManager = new ActivitiesManager();
			$update = $updateManager->goodWeather($_GET['id'], $updateWeather);
		}
		else { // Mauvaise météo
			$updateWeather = 0;
			$updateManager = new ActivitiesManager();
			$update = $updateManager->badWeather($_GET['id'], $updateWeather);
		}

		header('Location: index.php?action=openActivitiesAdmin');
	}

	// HOTELS
	function changeHotel() // Modification d'un hotel
	{
		$saveManager = new HotelsManager();
		$save = $saveManager->saveHotel($_POST['id'], $_POST['name'], $_POST['content'], $_POST['location'], $_POST['rooms'], $_POST['prices']);

		header('Location: index.php?action=openHotelsAdmin');
	}
	function changeImgHotel($id, $destinationFile) // Modifier l'image d'un hôtel
	{
		$imgHotelManager = new HotelsManager();
		$imgManager = $imgHotelManager->changeImgHotel($id, $destinationFile);

		header('Location: index.php?action=openHotelsAdmin');
	}
	function changeServices($id, $services) // Modifier les services d'un hôtel
	{
		$servicesManager = new HotelsManager();
		$servicesHotel = $servicesManager->changeServices($id, $services);

		header('Location: index.php?action=openHotelsAdmin');
	}

// GESTION SIGNALEMENTS ET AVIS UTILES
	function deleteReport() // Retirer le signalement
	{
		$removeManager = new OpinionsManager();
	    $remove = $removeManager->removeReport($_GET['id']);

		header('Location: index.php?action=openReportsAdmin');
	}

	function deleteOpinion() // Supprimer un avis signalé
	{
		$deleteManager = new OpinionsManager();
	    $delete = $deleteManager->eliminateOpinion($_GET['id']);

		header('Location: index.php?action=openReportsAdmin');
	}
}