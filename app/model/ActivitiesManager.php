<?php
namespace app\model\ActivitiesManager;

require "vendor/autoload.php";
use app\model\Manager;

class ActivitiesManager extends Manager 
{
    public function getActivities() // Récupération des activtiés
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, picture FROM billets ORDER BY DESC LIMIT 0, 5');

        return $req;
    }
    public function getActivity($activityId) // Récupération d'une activité grace à son id
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, picture FROM billets WHERE id = ?');
        $req->execute(array($activityId));
        $post = $req->fetch();

        return $post;
    }
    public function addNewActivity($title, $content) // Ajout d'un nouveau billet
    {
       $db = $this->dbConnect();
       $newActivity = $db->prepare('INSERT INTO activities(title, content, picture) VALUES (:title, :content, :picture)');
       $addNewActivity = $newActivity->execute(array(
            $_FILES["pictures"]["name"],
            $_FILES["pictures"]["type"],
        	$_FILES["pictures"]["size"],
        	file_get_contents($_FILES["pictures"]["tmp_name"]);

       return $addNewPost;
    }
}