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
	function openAdmin() // Afficher la page d'administrateur
	{
		$activityManager = new ActivitiesManager(); 
	    $activities = $activityManager->getActivities();

	    $adminManager = new OpinionsManager();
		$admin = $adminManager->reportAdmin();

	    require('app/view/adminView.php');
	}
	function openNewActivity() // Afficher formulaire pour ajout de nouvelle activité
	{
		require('app/view/additionView.php');
	}



	function listActivities() // Afficher la liste des activités
	{
	    $activityManager = new ActivitiesManager();
	    $activitiess = $activityManager->getActivities();

	    require('app/view/homeView.php');
	}
}
?>