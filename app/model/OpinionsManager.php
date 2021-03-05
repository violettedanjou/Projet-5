<?php
namespace app\model\OpinionsManager;

require "vendor/autoload.php";
use app\model\Manager;

class OpinionsManager extends Manager 
{
    public function pseudoAuthor($activityId) // Jointure : récupérer le pseudo d'un membre grace à son id
    {
    	$db = $this->dbConnect();
    	$pseudoOpinion = $db->prepare('SELECT members.pseudo, opinions.id, opinions.content, DATE_FORMAT(opinions.date, \'%d/%m/%Y à %Hh%imin%ss\') AS opinion_date_fr FROM opinions INNER JOIN members ON opinions.author = members.id WHERE opinions.opinion_id = ?');
    	$pseudoOpinion->execute(array($activityId));

    	return $pseudoOpinion;
    }	
}


?>