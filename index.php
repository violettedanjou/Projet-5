<?php
require "vendor/autoload.php";
session_start();

use app\controller\controller_front;
use app\controller\controller_back;

try {
	if (isset($_GET['action'])) {

// PAGE INSCRIPTION
		// on affiche le formulaire
	    if ($_GET['action'] == 'openSignup') { 
	        $testController = new controller_front();
			$testController->openSignup();
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
	            $insertMember = new controller_back();
				$insertMember->connect(); 
	        }
	        else {
	            throw new Exception("Veuillez entrer votre pseudo.", 1);
	        }   
	    }
	    // page qui affiche le formulaire 
	    elseif ($_GET['action'] == 'openSignin') {
	        $insertMember = new controller_front();
			$insertMember->openSignin();
	    }

// PAGE DECONNEXION 
	    if ($_GET['action'] == 'validSignout') {
	        signout();    
	    } 

// LISTE DES ACTIVITES PAGE D'ACCUEIL
        //affiche la listes des activités
        elseif ($_GET['action'] == 'listActivities') {
            listActivities(); 
        }
        // afficher une activité et ses avis
        elseif ($_GET['action'] == 'activity') { 
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                    activity();             
            }
            else {
                throw new Exception("Aucun identifiant de l'activité envoyé", 1);   
            }
        }

// PAGE ADMINISTRATION
		// Afficher la page administration
        if ($_GET['action'] == 'openAdmin') {
            if ((isset($_SESSION['admin'])) AND ($_SESSION['admin'] == 1)) {
                openAdmin();
            }
            else {
                throw new Exception("Cette partie est réservée à l'administrateur", 1);
            } 
        }
        // Afficher le formulaire d'ajout d'une nouvelle activité
        elseif ($_GET['action'] == 'openNewActivity') {
            if ((isset($_SESSION['admin'])) AND ($_SESSION['admin'] == 1)) {
               openNewActivity(); 
            }
            else {
                throw new Exception("Vous ne pouvez pas accéder à cette page.", 1);
            }
        }
        // Valider le formulaire d'ajout d'une nouvelle activité
        if ($_GET['action'] == 'validNewPost') {
            if ((isset($_SESSION['admin'])) AND ($_SESSION['admin'] == 1)) {
                if (isset($_POST['title']) AND isset($_POST['content']) AND isset($_POST['picture'])) {
                addActivity();
                }
                else {
                    throw new Exception("Veuillez ajouter une nouvelle activité.", 1);
                }
            } 
            else {
                throw new Exception("Vous ne pouvez pas accéder à cette page.", 1);    
            }      
        }
        // Afficher formulaire de modification d'une activité
        elseif($_GET['action'] == 'openEdition') {
            if ((isset($_SESSION['admin'])) AND ($_SESSION['admin'] == 1)) {
               if (isset($_GET['id']) && $_GET['id'] > 0) {
                openEdition();
                }
                else {
                    throw new Exception("Aucun identifiant de billet envoyé.", 1);
                } 
            }
            else {
                throw new Exception("Vous ne pouvez pas accéder à cette page.", 1);
            }
        }
        // Valider le formulaire de modification d'une activité
        elseif ($_GET['action'] == 'validEdition') {
            if ((isset($_SESSION['admin'])) AND ($_SESSION['admin'] == 1)) {
               if (isset($_POST['id']) && (isset($_POST['title'])) && (isset($_POST['content']))) {
                saveActivities();
                } 
            }
            else {
                throw new Exception("Vous ne pouvez pas accéder à cette page.", 1);
            }
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