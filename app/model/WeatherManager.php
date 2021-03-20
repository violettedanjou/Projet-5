<?php
namespace app\model;

require "vendor/autoload.php";
use app\model\Manager;

class WeatherManager extends Manager 
{
   

    public function updateThunderstorm($idActivity) // Passer thunderstorm à true (comme un signalement) au moment de la création d'une activité
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE weather SET thunderstorm = 1 WHERE id = ?');
        $req->execute(array($idActivity));

        return $req;   	
    }   
}