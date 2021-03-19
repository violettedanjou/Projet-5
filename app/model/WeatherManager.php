<?php
namespace app\model;

require "vendor/autoload.php";
use app\model\Manager;

class WeatherManager extends Manager 
{
/*    public function weatherActivity($idActivity) // Jointure : récupérer la météo d'une activité grace à son id et afficher sur la vue
    {
    	$db = $this->dbConnect();
    	$weather = $db->prepare('SELECT weather.thunderstorm, activities.id, activities.title, activities.content, activities.picture AS weatherActivity FROM activities INNER JOIN weather ON activities.weather = weather.id WHERE activities.id = ?');
    	$weather->execute(array($idActivity));

    	return $weather;
    }
*/    
}