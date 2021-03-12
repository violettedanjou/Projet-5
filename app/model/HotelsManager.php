<?php
namespace app\model;

require "vendor/autoload.php";
use app\model\Manager;

class HotelsManager extends Manager 
{
    public function getHotels() // Récupération des hotels
    {
        $db = $this->dbConnect();
        $listhotels = $db->query('SELECT id, name, content, location, rooms, prices, picture FROM hotels LIMIT 0, 5');

        return $listhotels;
    }
    public function getHotel($id) // Récupération d'une activité grace à son id
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, name, content, location, rooms, prices, picture FROM hotels WHERE id = ?');
        $req->execute(array($id));
        $hotel = $req->fetch();

        return $hotel;
    }
    public function changeHotel($id) // Récupération d'une activité pour la modifier
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, name, content, location, rooms, prices, picture FROM hotels WHERE id = ?');
        $req->execute(array($id));
        $changeHotel = $req->fetch();

        return $changeHotel;
    }    
}