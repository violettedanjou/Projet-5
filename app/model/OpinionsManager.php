<?php
namespace app\model;

require "vendor/autoload.php";
use app\model\Manager;

class OpinionsManager extends Manager 
{
    public function pseudoAuthorActivity($activityId) // Jointure : récupérer le pseudo d'un membre grace à son id
    {
    	$db = $this->dbConnect();
    	$pseudoOpinion = $db->prepare('SELECT members.pseudo, opinions.id, opinions.content, DATE_FORMAT(opinions.date_opinion, \'%d/%m/%Y à %Hh%imin%ss\') AS opinion_date_fr FROM opinions INNER JOIN members ON opinions.author = members.id WHERE opinions.id_activity = ?');
    	$pseudoOpinion->execute(array($activityId));

    	return $pseudoOpinion;
    }
    public function pseudoAuthorHotel($hotelId) // Jointure : récupérer le pseudo d'un membre grace à son id
    {
    	$db = $this->dbConnect();
    	$pseudoOpinion = $db->prepare('SELECT members.pseudo, opinions.id, opinions.content, DATE_FORMAT(opinions.date_opinion, \'%d/%m/%Y à %Hh%imin%ss\') AS opinion_date_fr FROM opinions INNER JOIN members ON opinions.author = members.id WHERE opinions.id_hotel = ?');
    	$pseudoOpinion->execute(array($hotelId));

    	return $pseudoOpinion;
    }
    public function activityOpinion($id, $content) // Insérer un nouvel avis d'activité
    {
        $db = $this->dbConnect();
        $opinions = $db->prepare('INSERT INTO opinions(id_activity, author, content, date_opinion) VALUES(?, ?, ?, NOW())');
        $affectedLines = $opinions->execute(array($id, $_SESSION['id'], $content));

        return $affectedLines;
    }
    public function hotelOpinion($id, $content) // Insérer un nouvel avis d'hotel
    {
        $db = $this->dbConnect();
        $opinions = $db->prepare('INSERT INTO opinions(id_hotel, author, content, date_opinion) VALUES(?, ?, ?, NOW())');
        $affectedLines = $opinions->execute(array($id, $_SESSION['id'], $content));

        return $affectedLines;
    }


    public function reportActivity($idActivity) // Signaler un avis d'activité
    {
        $db = $this->dbConnect();
        $report = $db->prepare('UPDATE opinions SET report = 1 WHERE id_activity = ?');
        $report->execute(array($idActivity));

        return $report;
    }
    public function usefulActivity($idActivity) // Avis utile d'activité
    {
        $db = $this->dbConnect();
        $useful = $db->prepare('UPDATE opinions SET useful = 1 WHERE id_activity = ?');
        $useful->execute(array($idActivity));

        return $useful;
    } 
    public function reportHotel($idHotel) // Signaler un avis d'hotel
    {
        $db = $this->dbConnect();
        $report = $db->prepare('UPDATE opinions SET report = 1 WHERE id_hotel = ?');
        $report->execute(array($idHotel));

        return $report;
    }
    public function usefulHotel($idHotel) // Avis utile d'hotel
    {
        $db = $this->dbConnect();
        $useful = $db->prepare('UPDATE opinions SET useful = 1 WHERE id_hotel = ?');
        $useful->execute(array($idHotel));

        return $useful;
    }     



    public function reportAdmin() // Afficher la liste des avis signalés
    {
    	$db = $this->dbConnect();
    	$req = $db->query('SELECT id, content, report AS opinion_report, DATE_FORMAT(date_opinion, \'%d/%m/%Y à %Hh%imin%ss\') AS opinion_date_fr FROM opinions WHERE report = 1 ORDER BY opinion_date_fr ASC');

    	return $req;
    }
    public function usefulAdmin() // Afficher la liste des avis utiles
    {
    	$db = $this->dbConnect();
    	$req = $db->query('SELECT id, content, report AS opinion_report, DATE_FORMAT(date_opinion, \'%d/%m/%Y à %Hh%imin%ss\') AS opinion_date_fr FROM opinions WHERE useful = 1 ORDER BY opinion_date_fr ASC');

    	return $req;
    }
    public function removeReport($id) // Retirer le signalement d'un avis
    {
    	$db = $this->dbConnect();
    	$req = $db->prepare('UPDATE opinions SET report = 0 WHERE id = ?');
        $req->execute(array($id));

    	return $req;
    }
    public function eliminateOpinion($activityId) // Supprimer un commentaire signalé
    {
    	$db = $this->dbConnect();
        $deleteOpinion = $db->prepare('DELETE FROM opinions WHERE id = ?');
        $deleteOpinion->execute(array($activityId));

        return $deleteOpinion;
    }
}


?>