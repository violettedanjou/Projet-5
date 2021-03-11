<?php
namespace app\model;

require "vendor/autoload.php";
use app\model\Manager;

class OpinionsManager extends Manager 
{
    public function pseudoAuthor($activityId) // Jointure : récupérer le pseudo d'un membre grace à son id
    {
    	$db = $this->dbConnect();
    	$pseudoOpinion = $db->prepare('SELECT members.pseudo, opinions.id, opinions.content, DATE_FORMAT(opinions.date_opinion, \'%d/%m/%Y à %Hh%imin%ss\') AS opinion_date_fr FROM opinions INNER JOIN members ON opinions.author = members.id WHERE opinions.opinion_id = ?');
    	$pseudoOpinion->execute(array($activityId));

    	return $pseudoOpinion;
    }
    public function activityOpinion($activityId, $content) // Insérer un nouvel avis
    {
        $db = $this->dbConnect();
        $opinions = $db->prepare('INSERT INTO opinions(opinion_id, author, content, date_opinion) VALUES(?, ?, ?, NOW())');
        $affectedLines = $opinions->execute(array($activityId, $_SESSION['id'], $content));

        return $affectedLines;
    }
    public function reportOpinion($id) // Signaler un avis
    {
        $db = $this->dbConnect();
        $report = $db->prepare('UPDATE opinions SET report = 1 WHERE id = ?');
        $report->execute(array($id));

        return $report;
    }
    public function usefulOpinion($id) // Signaler un avis
    {
        $db = $this->dbConnect();
        $useful = $db->prepare('UPDATE opinions SET useful = 1 WHERE id = ?');
        $useful->execute(array($id));

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
    	$req = $db->query('SELECT id, content, report AS opinion_report, DATE_FORMAT(date_opinion, \'%d/%m/%Y à %Hh%imin%ss\') AS opinion_date_fr FROM opinions WHERE report = 1 ORDER BY opinion_date_fr ASC');

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