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
    public function getActivities($start, $activitiesOfPage) // Récupération des activtiés
    {
        $db = $this->dbConnect();
        $listactivities = $db->query('SELECT id, title, content, picture FROM activities ORDER BY id ASC LIMIT '. $start . ' , '. $activitiesOfPage);

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
    public function addNewActivity($title, $content, $weather, $picture) // Ajout d'une nouvelle activité
    {
       $db = $this->dbConnect();
       $newActivity = $db->prepare('INSERT INTO activities(title, content, weather, picture) VALUES (:title, :content, :weather, :picture)');
       $addNewActivity = $newActivity->execute(array(
            'title' => $title,
            'content' => $content,
            'weather' => $weather,
            'picture' => $picture));

       return $addNewActivity;
    }


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
    public function goodWeather($id, $updateWeather) // Passer la bonne météo à 1
    {
        $db = $this->dbConnect();
        $good = $db->prepare('UPDATE activities SET weather = 1 WHERE id = ?');
        $good->execute(array($id));

        return $good;
    }
    public function badWeather($id, $updateWeather) // Passer la mauvaise météo à 0
    {
        $db = $this->dbConnect();
        $bad = $db->prepare('UPDATE activities SET weather = 0 WHERE id = ?');
        $bad->execute(array($id));

        return $bad;
    }  
    public function deleteActivity($id) // Supprimer une activité
    {
        $db = $this->dbConnect();
        $delete = $db->prepare('DELETE FROM activities WHERE id = ?');
        $delete->execute(array($id));

        return $delete;
    }
}













