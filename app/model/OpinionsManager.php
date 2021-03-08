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
    public function reportAdmin() // Afficher la liste des avis signalés
    {
    	$db = $this->dbConnect();
    	$req = $db->query('SELECT id, content, report AS opinion_report, DATE_FORMAT(date_opinion, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM opinions WHERE report = 1 ORDER BY creation_date_fr ASC');

    	return $req;
    }	
}


?>