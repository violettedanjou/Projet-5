<?php
require "vendor/autoload.php";
session_start();

use app\controller\controller_front;
use app\controller\controller_back;

try {
	if (isset($_GET['action'])) {

// PAGE INSCRIPTION
		// on affiche le formulaire
	    if ($_GET['action'] == 'afficheSignup') { 
	        $testController = new controller_front();
			$testController->afficheSignup();
	    }
		// on traite le formulaire
	    elseif ($_GET['action'] == 'validSignup') {  
	        if ((isset($_POST['pseudo']) AND (strlen($_POST['pseudo']) != 0))) {

	            if ((isset($_POST['pass']) == isset($_POST['pass_confirm']))) {

	                if ((isset($_POST['email']))) {
	                    $_POST['email'] = htmlspecialchars($_POST['email']);
	                
	                    if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email'])) {
	                        $insertMember = new controller_back();
							$insertMember->insert();
	                    }
	                    else {
	                        throw new Exception("L'adresse email n'est pas valide, recommencez. ", 1);
	                    }   
	                }
	                else {
	                    throw new Exception("Veuillez entrer une adresse email. ", 1);
	                }
	            }
	            else {
	                throw new Exception("Mots de passe différents. ", 1);
	            }
	        }
	        else {
	            throw new Exception("Veuillez saisir un pseudo. "); 
	        }
	    }

// PAGE CONNEXION
	    // formulaire de connexion
	    if ($_GET['action'] == 'validSignin') {
	        // mdp ok avec mdp de la bdd donc on appelle fonction connect()
	        if (isset($_POST['pseudo']) AND isset($_POST['pass'])) {
	            connect(); 
	        }
	        else {
	            throw new Exception("Veuillez entrer votre pseudo.", 1);
	        }   
	    }
	    // page qui affiche le formulaire 
	    elseif ($_GET['action'] == 'afficheSignin') {
	        afficheSignin();
	    }

// PAGE DECONNEXION 
	    if ($_GET['action'] == 'validSignout') {
	        signout();    
	    } 
	}
	else {
		require('app/view/homeView.php');
	}   	
}
catch(Exception $e) {
    require('app/view/errorView.php');
}






/*if (isset($_GET['action'])) {
	echo 'Il y a une action';
	$testController = new controller();
	$testController->test();
}
else {
	echo 'Il ny a pas daction';
	/* renvoyer sur une autre page */
//}

?>