<?php
namespace app\model;

require "vendor/autoload.php";
use app\model\Manager;

class ActivitiesManager extends Manager 
{
	// METEO 
	public function displayWeather($startWeather, $paginationWeather, $weather) // Afficher sur la page d'accueil la météo et son activité 
	{
    	$db = $this->dbConnect();
    	$weather = $db->query('SELECT id, title, content, weather, picture FROM activities WHERE weather = ' .$weather. ' ORDER BY id ASC LIMIT '. $startWeather . ' , '. $paginationWeather);

    	return $weather;
	}     
    public function getActivities($start, $activitiesOfPage) // Récupération des activtiés + Pagination
    {
        $db = $this->dbConnect();
        $listactivities = $db->query('SELECT id, title, content, picture FROM activities ORDER BY id ASC LIMIT '. $start . ' , '. $activitiesOfPage);

        return $listactivities;
    }
	// PAGINATION 	
    public function allActivities() // Compter le nombre d'activités au total
    {
        $db = $this->dbConnect();
        $allActivities = $db->query('SELECT COUNT(*) AS nbrActivities FROM activities');

        return $allActivities;
    } 
    public function allActivitiesWeather() // Compter le nombre d'activités au total pour afficher dans le bloc de la météo
    {
        $db = $this->dbConnect();
        $allActivities = $db->query('SELECT COUNT(*) AS nbrActivitiesWeather FROM activities');

        return $allActivities;
    } 



    public function getActivity($activityId) // Récupération d'une activité grace à son id
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, picture FROM activities WHERE id = ?');
        $req->execute(array($activityId));
        $activity = $req->fetch();

        return $activity;
    }


// ADMINISTRATION  
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
        $req = $db->prepare('SELECT id, title, content, weather, picture FROM activities WHERE id = ?');
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
    public function goodWeather($id) // Modifier la météo à 1 (bonne)
    {
        $db = $this->dbConnect();
        $good = $db->prepare('UPDATE activities SET weather = 1 WHERE id = ?');
        $good->execute(array($id));

        return $good;
    }
    public function badWeather($id) // Modifier la météo à 0 (mauvaise)
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













