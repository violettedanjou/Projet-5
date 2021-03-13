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
	    // Page qui affiche le formulaire de connexion
	    if ($_GET['action'] == 'openSignin') {
	        $formSigninMember = new controller_front();
			$formSigninMember->openSignin();
	    }
	    // Valider le formulaire de connexion
	    elseif ($_GET['action'] == 'validSignin') {
	        // mdp ok avec mdp de la bdd donc on appelle fonction connect()
	        if (isset($_POST['pseudo']) AND isset($_POST['pass'])) {
	            $signinMember = new controller_back();
				$signinMember->connect(); 
	        }
	        else {
	            throw new Exception("Veuillez entrer votre pseudo.", 1);
	        }   
	    }	    

// PAGE DECONNEXION 
	    if ($_GET['action'] == 'validSignout') {
	        $signoutMember = new controller_back();
			$signoutMember->signout();    
	    } 

// LISTE DES ACTIVITES et DES HOTELS - PAGE D'ACCUEIL
        // Affiche la listes des activités
        if ($_GET['action'] == 'listActivitiesHotels') {
            $listActivitiesHotels = new controller_front();
			$listActivitiesHotels->listActivitiesHotels(); 
        }
        // Afficher une activité et ses avis
        elseif ($_GET['action'] == 'activity') { 
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $oneActivity = new controller_front();
				$oneActivity->activity();             
            }
            else {
                throw new Exception("Aucun identifiant de l'activité envoyé", 1);   
            }
        }
        // Afficher un hotel et ses avis
        elseif ($_GET['action'] == 'hotel') { 
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $oneHotel = new controller_front();
				$oneHotel->hotel();             
            }
            else {
                throw new Exception("Aucun identifiant de l'activité envoyé", 1);   
            }
        }

// Ajouter un avis à une activité addHotelOpinion
        elseif ($_GET['action'] == 'addActivityOpinion') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (isset($_SESSION['id']) && isset($_SESSION['pseudo'])) {
                    if (!empty($_POST['content'])) {
                    	//die(var_dump($_POST['content']));
                        $addNewOpinion = new controller_front();
						$addNewOpinion->addActivityOpinion($_GET['id'], $_POST['content']);
                    }
                    else {
                        throw new Exception("Tous les champs ne sont pas remplis");
                    }
                }
                else {
                    throw new Exception("Veuillez vous connecter pour ajouter un avis.", 1);
                }
            }
            else {
                throw new Exception("Aucun identifiant d'activité envoyé");
            }
        }
// Ajouter un avis à un hotel 
        elseif ($_GET['action'] == 'addHotelOpinion') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (isset($_SESSION['id']) && isset($_SESSION['pseudo'])) {
                    if (!empty($_POST['content'])) {
                        $addNewOpinion = new controller_front();
						$addNewOpinion->addHotelOpinion($_GET['id'], $_POST['content']);
                    }
                    else {
                        throw new Exception("Tous les champs ne sont pas remplis");
                    }
                }
                else {
                    throw new Exception("Veuillez vous connecter pour ajouter un avis.", 1);
                }
            }
            else {
                throw new Exception("Aucun identifiant d'activité envoyé");
            }
        }     

// Signaler un avis
        if ($_GET['action'] == 'validReport') { 
            $reportOpinion = new controller_back();
			$reportOpinion->report();
        } 
// Lien avis est utile 
        elseif ($_GET['action'] == 'validUseful') {
        	$usefulOpinion = new controller_back();
			$usefulOpinion->useful();
        }


// PAGE PROFILE        
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
						$infosfichier = pathinfo($_FILES['pictureProfile']['name']);
						$extension_upload = $infosfichier['extension'];
						$extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');

					    if (in_array($extension_upload, $extensions_autorisees)) {
			                // On peut valider le fichier et le stocker définitivement
						    move_uploaded_file($_FILES['pictureProfile']['tmp_name'], 'pictures/profile' . basename($_FILES['pictureProfile']['name']));
					        echo "L'envoi a bien été effectué !";
						                
						    $validProfile = new controller_front();
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
        elseif ($_GET['action'] == 'validNewActivity') {
            if ((isset($_SESSION['admin'])) AND ($_SESSION['admin'] == 1)) {
                if (isset($_POST['title']) AND isset($_POST['content'])) {
			        if (isset($_FILES['pictureActivity']) AND $_FILES['pictureActivity']['error'] == 0) {
						if ($_FILES['pictureActivity']['size'] <= 1000000) {

							$infosfichier = pathinfo($_FILES['pictureActivity']['name']);
							$extension_upload = $infosfichier['extension'];
							$extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');

					    	if (in_array($extension_upload, $extensions_autorisees)) {
					    		$destinationFile = 'pictures/activities/' . $_SESSION['id'] . basename($_FILES['pictureActivity']['name']);
						        move_uploaded_file($_FILES['pictureActivity']['tmp_name'], $destinationFile);
						        echo "L'envoi a bien été effectué !";
						                
						        $validNewActivity = new controller_back();
								$validNewActivity->addActivity($fichierDestination);
						    }
						    else {
						    	throw new Exception("L'extension de l'image est incorrect", 1);
						    }
						}
						else {
							throw new Exception("La taille de l'image n'est pas bonne.", 1);
						}
					} 
					else {
						throw new Exception("Veuillez entrer une image correctement.", 1);
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
        // Afficher le formulaire d'ajout d'un nouvel hotel
        if ($_GET['action'] == 'openNewHotel') {
            if ((isset($_SESSION['admin'])) AND ($_SESSION['admin'] == 1)) {
                $formNewHotel = new controller_front();
				$formNewHotel->openNewHotel(); 
            }
            else {
                throw new Exception("Vous ne pouvez pas accéder à cette page.", 1);
            }
        } 
        // Valider le formulaire d'ajout d'un nouvel hotel 
        elseif ($_GET['action'] == 'validNewHotel') {
            if ((isset($_SESSION['admin'])) AND ($_SESSION['admin'] == 1)) {
                if (isset($_POST['name']) AND isset($_POST['content']) AND isset($_POST['location']) AND isset($_POST['rooms']) AND isset($_POST['prices'])) {
			        if (isset($_FILES['pictureHotel']) AND $_FILES['pictureHotel']['error'] == 0) {
						if ($_FILES['pictureHotel']['size'] <= 1000000) {

							$infosfichier = pathinfo($_FILES['pictureHotel']['name']);
							$extension_upload = $infosfichier['extension'];
							$extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');

					    	if (in_array($extension_upload, $extensions_autorisees)) {
						        move_uploaded_file($_FILES['pictureHotel']['tmp_name'], 'pictures/activities/' . $_SESSION['id'] . basename($_FILES['pictureHotel']['name']));
						        echo "L'envoi a bien été effectué !";
						                
						        $validNewHotel = new controller_back();
								$validNewHotel->addHotel();
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
        // Afficher formulaire de modification d'une activité openChangeHotel
        if($_GET['action'] == 'openChangeActivity') {
            if ((isset($_SESSION['admin'])) AND ($_SESSION['admin'] == 1)) {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
	                $formChangeActivity = new controller_front();
					$formChangeActivity->openChangeActivity();
                }
                else {
                    throw new Exception("Aucun identifiant d'activité envoyé.", 1);
                } 
            }
            else {
                throw new Exception("Vous ne pouvez pas accéder à cette page.", 1);
            }
        }
        // Valider le formulaire de modification d'une activité
        elseif ($_GET['action'] == 'validChangeActivity') {
            if ((isset($_SESSION['admin'])) AND ($_SESSION['admin'] == 1)) {
                if (isset($_POST['id']) && (isset($_POST['title'])) && (isset($_POST['content']))) {
                	$validChangeActivity = new controller_back();
					$validChangeActivity->changeActivity();		
                } 
                else {
                	throw new Exception("Veuillez remplir les champs.", 1);
                }
            }
            else {
                throw new Exception("Vous ne pouvez pas accéder à cette page.", 1);
            }
        }
        elseif ($_GET['action'] == 'validChangeActivity') {
            if ((isset($_SESSION['admin'])) AND ($_SESSION['admin'] == 1)) {
                if (isset($_FILES['ChangeImgActivity']) AND ($_FILES['ChangeImgActivity']['error'] == 0)) {
                	
					if ($_FILES['ChangeImgActivity']['size'] <= 1000000) {
						$infosfichier = pathinfo($_FILES['ChangeImgActivity']['name']);
						$extension_upload = $infosfichier['extension'];
						$extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');

				    	if (in_array($extension_upload, $extensions_autorisees)) {
				    		$destinationFile = 'pictures/activities/' . $_SESSION['id'] . basename($_FILES['ChangeImgActivity']['name']);
					        move_uploaded_file($_FILES['ChangeImgActivity']['tmp_name'], $destinationFile);
					        echo "L'envoi a bien été effectué !";

                			$validChangeImg = new controller_back();
							$validChangeImg->changeImgActivity($destinationFile);
						}
						else {
							throw new Exception("L'extension de l'image n'est pas correcte.", 1);
						}
					}
					else {
						throw new Exception("La taille de l'image n'est pas bonne.", 1);
					}
				}
				else {
					throw new Exception("Insérez une image correctement.", 1);
				}
			}
			else {
				throw new Exception("Vous ne pouvez pas accéder à cette page.", 1);
				
			}
		}		
        // Afficher formulaire de modification d'un hotel 
        if($_GET['action'] == 'openChangeHotel') {
            if ((isset($_SESSION['admin'])) AND ($_SESSION['admin'] == 1)) {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
	                $formChangeHotel = new controller_front();
					$formChangeHotel->openChangeHotel();
                }
                else {
                    throw new Exception("Aucun identifiant d'activité envoyé.", 1);
                } 
            }
            else {
                throw new Exception("Vous ne pouvez pas accéder à cette page.", 1);
            }
        }



        // Retirer le signalement d'un avis
        elseif ($_GET['action'] == 'deleteReport') {
            if ((isset($_SESSION['admin'])) AND ($_SESSION['admin'] == 1)) {
                if (isset($_GET['id']) && $_GET['id'] > 0) { 
               		$deleteReportOpinion = new controller_back();
					$deleteReportOpinion->deleteReport();
                } 
            }
            else {
                throw new Exception("Vous ne pouvez pas accéder à cette page.", 1);
            }
        }
        // Supprimer un avis signalé
        elseif ($_GET['action'] == 'deleteOpinion') {
            if ((isset($_SESSION['admin'])) AND ($_SESSION['admin'] == 1)) {
                if (isset($_GET['id']) && $_GET['id'] > 0) { 
	                $deleteOpinion = new controller_back();
					$deleteOpinion->deleteOpinion();
	            } 
            }
            else {
                throw new Exception("Vous ne pouvez pas accéder à cette page.", 1);
            } 
        }    
	}
	else {
		$listActivitiesHotels = new controller_front();
		$listActivitiesHotels->listActivitiesHotels();
	}   	
}
catch(Exception $e) {
    require('app/view/errorView.php');
}


?>