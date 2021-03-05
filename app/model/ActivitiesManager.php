<?php
namespace app\model\ActivitiesManager;

require "vendor/autoload.php";
use app\model\ActivitiesManager;

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
}