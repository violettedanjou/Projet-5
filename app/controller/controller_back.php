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
	function report() // Signaler un avis
	{
		$reportManager = new OpinionsManager();
		$report = $reportManager->reportOpinion($_GET['id']);

		header('Location: index.php?action=activity&id='. $_GET['id']);
	}
	function useful() // Signaler un avis
	{
		$usefulManager = new OpinionsManager();
		$useful = $usefulManager->usefulOpinion($_GET['id']);

		header('Location: index.php?action=activity&id='. $_GET['id']);
	}




// PAGE ADMINISTRATION 
	function addActivity($fichierDestination) // Ajouter une nouvelle activité
	{
		$newActivityManager = new ActivitiesManager();
		$newActivity = $newActivityManager->addNewActivity($_POST['title'], $_POST['content'], $destinationFile);

		header('Location: index.php?action=openAdmin');
	}
	function changeActivity() // Modification d'une activité
	{
		$saveManager = new ActivitiesManager();
		$save = $saveManager->saveActivity($_POST['id'], $_POST['title'], $_POST['content']);

		header('Location: index.php?action=openAdmin');
	}
	function changeImgActivity()
	{
		$imgActivityManager = new ActivitiesManager();
		$imgManager = $imgActivityManager->changeImgActivity($destinationFile);

		header('Location: index.php?action=openAdmin');
	}

	function addHotel() // Ajouter un nouvel hotel
	{
		$newHotelManager = new HotelsManager();
		$newHotel = $newHotelManager->addNewHotel($_POST['name'], $_POST['content'], $_POST['location'], $_POST['rooms'], $_POST['prices'], $destinationFile);

		header('Location: index.php?action=openAdmin');
	}

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















