<?php 
namespace app\controller;

require "vendor/autoload.php";
use app\model\MemberManager;
use app\model\ActivitiesManager;
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


	function activity() // Afficher une activité en particulier
	{
	    $activityManager = new ActivitiesManager();
	    $opinionManager = new OpinionsManager();

	    $activity = $activityManager->getActivity($_GET['id']);
	    $opinions = $opinionManager->pseudoAuthor($_GET['id']);

	    require('app/view/activityView.php');
	}
	function validProfile() // Ajouter une image à son profile
	{
		$profileManager = new MemberManager();
		$profile = $profileManager->addPicture($_POST['picture']);
	}

	// ADMINISTRATION 
	function addActivity() // Ajouter une nouvelle activité
	{
		$newActivityManager = new ActivitiesManager();
		$newActivity = $newActivityManager->addNewActivity($_POST['title'], $_POST['content'], $_POST['picture']);

		header('Location: index.php?action=openAdmin');
	}
	function openChange() // Récupération d'une activité pour la modifier
	{
		$changeManager = new ActivitiesManager();
	    $change = $changeManager->changeActivity($_GET['id']);

	    require('app/view/changeView.php');
	}
	function saveActivity() // Modification d'une activité
	{
		$saveManager = new ActivitiesManager();
		$save = $saveManager->modifActivity($_POST['id'], $_POST['title'], $_POST['content'], $_POST['picture']);

		header('Location: index.php?action=openAdmin');
	}
}


?>















