<?php
namespace app\model;

require "vendor/autoload.php";
use app\model\Manager;

class ActivitiesManager extends Manager 
{

// PAGINATION 	
    public function allActivities() // Compter le nombre d'activités au total
    {
        $db = $this->dbConnect();
        $allActivities = $db->query('SELECT COUNT(*) AS nbrActivities FROM activities');

        return $allActivities;
    } 
// PAGINATION     
    public function getActivities(/*$start, $activitiesOfPage*/) // Récupération des activtiés
    {
        $db = $this->dbConnect();
        $listactivities = $db->query('SELECT id, title, content, picture FROM activities ORDER BY id ASC /*LIMIT .$start.,. $activitiesOfPage*/');
        /*$listactivities->bindValue(':start', $start, \PDO::PARAM_INT);
		$listactivities->bindValue(':activitiesOfPage', $activitiesOfPage, \PDO::PARAM_INT);
        $listactivities->execute(array());*/

        return $listactivities;
    }


// METEO 
	public function displayWeather() // Afficher sur la page d'accueil la météo et son activité 
	{
    	$db = $this->dbConnect();
    	$weather = $db->query('SELECT id, title, content, picture, weather FROM activities');

    	return $weather;
	}




    public function getActivity($activityId) // Récupération d'une activité grace à son id
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, picture FROM activities WHERE id = ?');
        $req->execute(array($activityId));
        $activity = $req->fetch();

        return $activity;
    }
    public function addNewActivity($title, $content, $picture) // Ajout d'une nouvelle activité
    {
       $db = $this->dbConnect();
       $newActivity = $db->prepare('INSERT INTO activities(title, content, picture) VALUES (:title, :content, :picture)');
       $addNewActivity = $newActivity->execute(array(
            'title' => $title,
            'content' => $content,
            'picture' => $picture));

       return $addNewActivity;
    }


/*
    public function updateThunderstorm() // Passer thunderstorm à true (comme un signalement)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE activities SET weather = 1 WHERE id = ?');
        $req->execute(array());

        return $req;   	
    }
*/





    public function changeActivity($activityId) // Récupération d'une activité pour la modifier
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, picture FROM activities WHERE id = ?');
        $req->execute(array($activityId));
        $changeActivity = $req->fetch();

        return $changeActivity;
    }
    public function saveActivity($id, $title, $content) // Modification du contenu d'une activité
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE activities SET title = :title, content = :content WHERE id = :id');
        $req->execute(array(
        	'title' => $title, 
        	'content' => $content, 
        	'id' => $id));

        return $req;
    }
    public function changeImgActivity($id, $picture) // Modification d'une image d'activité
    {
    	$db = $this->dbConnect();
        $req = $db->prepare('UPDATE activities SET picture = :picture WHERE id = :id');
        $changePicture = $req->execute(array(
        	'picture' => $picture, 
        	'id' => $id));

        return $changePicture;
    }
    public function deleteActivity($id) // Supprimer une activité
    {
        $db = $this->dbConnect();
        $delete = $db->prepare('DELETE FROM activities WHERE id = ?');
        $delete->execute(array($id));

        return $delete;
    }
}













