<?php 
namespace app\controller;

require "vendor/autoload.php";
use app\controller\controller_front;

class controller_front
{
	function afficheSignup() {
		require('app/view/signupView.php');
	}

	function afficheSignin() {
		require('app/view/signinView.php');
	}
	function afficheAdmin() // Afficher la page d'administrateur
	{
		$activityManager = new ActivitiesManager(); 
	    $activities = $activityManager->getActivities();

	    $adminManager = new OpinionsManager();
		$admin = $adminManager->reportAdmin();

	    require('app/view/adminView.php');
	}
}
?>