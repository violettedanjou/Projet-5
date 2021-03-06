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
	        $formSignupMember = new controller_front();
			$formSignupMember->openSignup();
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
	    // Valider le formulaire de connexion
	    if ($_GET['action'] == 'validSignin') {
	        // mdp ok avec mdp de la bdd donc on appelle fonction connect()
	        if (isset($_POST['pseudo']) AND isset($_POST['pass'])) {
	            $signinMember = new controller_back();
				$signinMember->connect(); 
	        }
	        else {
	            throw new Exception("Veuillez entrer votre pseudo.", 1);
	        }   
	    }
	    // Page qui affiche le formulaire de connexion
	    elseif ($_GET['action'] == 'openSignin') {
	        $formSigninMember = new controller_front();
			$formSigninMember->openSignin();
	    }

// PAGE DECONNEXION 
	    if ($_GET['action'] == 'validSignout') {
	        $signoutMember = new controller_back();
			$signoutMember->signout();    
	    } 

// LISTE DES ACTIVITES PAGE D'ACCUEIL
        // Affiche la listes des activités
        if ($_GET['action'] == 'listActivities') {
            $listActivity = new controller_back();
			$listActivity->listActivities(); 
        }
        // Afficher une activité et ses avis
        elseif ($_GET['action'] == 'activity') { 
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $oneActivity = new controller_back();
				$oneActivity->activity();             
            }
            else {
                throw new Exception("Aucun identifiant de l'activité envoyé", 1);   
            }
        }
        // Afficher la page profile 
        if ($_GET['action'] == 'openProfile') {
        	if (isset($_SESSION['id']) && isset($_SESSION['pseudo'])) {
        		$openProfileMember = new controller_front();
				$openProfileMember->openProfile();
        	}
        }
        elseif ($_GET['action'] == 'validProfile') {
        	if (isset($_SESSION['id']) && isset($_SESSION['pseudo'])) {
			    if (isset($_FILES['pictureProfile']) AND $_FILES['pictureProfile']['error'] == 0) {
					// Testons si le fichier n'est pas trop gros
					if ($_FILES['pictureProfile']['size'] <= 1000000) {
						// Testons si l'extension est autorisée
						$infosfichier = pathinfo($_FILES['pictureProfile'][$_SESSION['pseudo']]); // On veut le pseudo de la personne qui ajoute l'image
						$extension_upload = $infosfichier['extension'];
						$extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');

					    if (in_array($extension_upload, $extensions_autorisees)) {
			                // On peut valider le fichier et le stocker définitivement
						    move_uploaded_file($_FILES['pictureProfile']['tmp_name'], 'pictures/profile' . basename($_FILES['pictureProfile'][$_SESSION['pseudo']]));
					        echo "L'envoi a bien été effectué !";
						                
						    $validProfile = new controller_back();
							$validProfile->validProfile();
						}
				    }
				}
        	}
        }





// PAGE ADMINISTRATION
		// Afficher la page administration
        if ($_GET['action'] == 'openAdmin') {
            if ((isset($_SESSION['admin'])) AND ($_SESSION['admin'] == 1)) {
                $adminMember = new controller_front();
				$adminMember->openAdmin();
            }
            else {
                throw new Exception("Cette partie est réservée à l'administrateur", 1);
            } 
        }
        // Afficher le formulaire d'ajout d'une nouvelle activité
        if ($_GET['action'] == 'openNewActivity') {
            if ((isset($_SESSION['admin'])) AND ($_SESSION['admin'] == 1)) {
                $formNewActivity = new controller_front();
				$formNewActivity->openNewActivity(); 
            }
            else {
                throw new Exception("Vous ne pouvez pas accéder à cette page.", 1);
            }
        }
        // Valider le formulaire d'ajout d'une nouvelle activité
        elseif ($_GET['action'] == 'validNewPost') {
            if ((isset($_SESSION['admin'])) AND ($_SESSION['admin'] == 1)) {
                if (isset($_POST['title']) AND isset($_POST['content']) AND isset($_POST['picture'])) {
			        // Ajouter une image 
			        if ($_GET['action'] == 'validPicture') {
			        	if ((isset($_SESSION['admin'])) AND ($_SESSION['admin'] == 1)) {
			        		if (isset($_FILES['picture']) AND $_FILES['picture']['error'] == 0) {
					        	// Testons si le fichier n'est pas trop gros
						        if ($_FILES['picture']['size'] <= 1000000) {
						            // Testons si l'extension est autorisée
						            $infosfichier = pathinfo($_FILES['picture'][$_SESSION['id']]); // On veut l'id de l'activité
						            $extension_upload = $infosfichier['extension'];
						            $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');

					                if (in_array($extension_upload, $extensions_autorisees)) {
			                        	// On peut valider le fichier et le stocker définitivement
						                move_uploaded_file($_FILES['picture']['tmp_name'], 'pictures/activities' . basename($_FILES['picture'][$_SESSION['id']]));
						                echo "L'envoi a bien été effectué !";
						                
						                $validNewActivity = new controller_back();
										$validNewActivity->addActivity();
						            }
						        }
							}
			        	}
			        }                	
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
        if($_GET['action'] == 'openChange') {
            if ((isset($_SESSION['admin'])) AND ($_SESSION['admin'] == 1)) {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
	                $formChangeActivity = new controller_back();
					$formChangeActivity->openChange();
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
        elseif ($_GET['action'] == 'validChange') {
            if ((isset($_SESSION['admin'])) AND ($_SESSION['admin'] == 1)) {
                if (isset($_POST['id']) && (isset($_POST['title'])) && (isset($_POST['content'])) && (isset($_POST['picture']))) {
                	$validChangeActivity = new controller_back();
					$validChangeActivity->saveActivity();
                } 
                else {
                	throw new Exception("Veuillez remplir des champs.", 1);
                }
            }
            else {
                throw new Exception("Vous ne pouvez pas accéder à cette page.", 1);
            }
        }	    
	}
	else {
		require('app/view/homeView.php');

		/*$listActivity = new controller_back();
		$listActivity->listActivities();*/
	}   	
}
catch(Exception $e) {
    require('app/view/errorView.php');
}


?>