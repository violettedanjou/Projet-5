<?php 
namespace app\controller;

require "vendor/autoload.php";
use app\model\MemberManager;
use app\model\ActivitiesManager;
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
	function listActivities() // Afficher la liste des activités
	{
	    $activityManager = new ActivitiesManager();
	    $activities = $activityManager->getActivities();

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
	function addOpinion($activityId, $content) // Ajouter un avis
	{
	    $opinionManager = new OpinionsManager();
	    $affectedLines = $opinionManager->activityOpinion($activityId, $content);

	    if ($affectedLines === false) {
	        throw new Exception('Impossible d\'ajouter le commentaire !');
	    }
	    else {
	        header('Location: index.php?action=activity&id=' . $activityId);
	    }	
	}
	function openProfile()
	{
		require('app/view/profileView.php');
	}





// PAGE ADMINISTRATION
	function openAdmin() // Afficher la page d'administrateur
	{
		$activityManager = new ActivitiesManager(); 
	    $activities = $activityManager->getActivities();

	    $adminManager = new OpinionsManager();
		$admin = $adminManager->reportAdmin();

		$adminUsefulManager = new OpinionsManager();
		$useful = $adminUsefulManager->usefulAdmin();

	    require('app/view/adminView.php');
	}
	function openNewActivity() // Afficher formulaire pour ajout de nouvelle activité
	{
		require('app/view/additionView.php');
	}
	function openChange() // Récupération d'une activité pour la modifier
	{
		$changeManager = new ActivitiesManager();
	    $change = $changeManager->changeActivity($_GET['id']);

	    require('app/view/changeView.php');
	}




}
?>