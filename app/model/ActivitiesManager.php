<?php
namespace app\model\ActivitiesManager;

require "vendor/autoload.php";
use app\model\Manager;

class ActivitiesManager extends Manager 
{
    public function getActivities() // Récupération des activtiés
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, picture FROM activities LIMIT 0, 5');

        return $req;
    }
    public function getActivity($activityId) // Récupération d'une activité grace à son id
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, picture FROM activities WHERE id = ?');
        $req->execute(array($activityId));
        $post = $req->fetch();

        return $post;
    }
    public function addNewActivity($title, $content, $picture) // Ajout d'un nouveau billet
    {
       $db = $this->dbConnect();
       $newActivity = $db->prepare('INSERT INTO activities(title, content, picture) VALUES (:title, :content, :picture)');
       $addNewActivity = $newActivity->execute(array(
            'title' => $title,
            'content' => $content,
            $_FILES["pictures"]["name"],
            $_FILES["pictures"]["type"],
        	$_FILES["pictures"]["size"],
        	file_get_contents($_FILES["pictures"]["tmp_name"]))); // file_get_contents() pour convertir en chaine de caractères

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
    public function modifActivity($id, $title, $content, $picture) // Modification d'une activité
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE activities SET title = ?, content = ?, picture = ? WHERE id = ?');
        $req->execute(array($title, $content, $picture, $id));

        return $req;
    }
}














