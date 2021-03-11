<?php
namespace app\model;

require "vendor/autoload.php";
use app\model\Manager;

class ActivitiesManager extends Manager 
{
    public function getActivities() // Récupération des activtiés
    {
        $db = $this->dbConnect();
        $listactivities = $db->query('SELECT id, title, content, picture FROM activities LIMIT 0, 5');

        return $listactivities;
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
       		die(var_dump($picture));

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
    public function saveActivity($id, $title, $content, $picture) // Modification d'une activité
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE activities SET title = ?, content = ?, picture = ? WHERE id = ?');
        $req->execute(array(
        	'title' => $title, 
        	'content' => $content, 
        	'picture' => $picture, 
        	'id' => $id));

        return $req;
    }
}














