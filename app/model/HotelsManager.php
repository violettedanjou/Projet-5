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
    public function getHotel($id) // Récupération d'un hotel grace à son id
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, name, content, location, rooms, prices, picture FROM hotels WHERE id = ?');
        $req->execute(array($id));
        $hotel = $req->fetch();

        return $hotel;
    }
    public function addNewHotel($name, $content, $location, $rooms, $prices, $picture) // Ajout d'un nouvel hotel
    {
       $db = $this->dbConnect();
       $newHotel = $db->prepare('INSERT INTO hotels(name, content, location, rooms, prices, picture) VALUES (:name, :content, :location, :rooms, :prices, :picture)');
       $addNewHotel = $newHotel->execute(array(
            'name' => $name,
            'content' => $content,
            'location' => $location,
            'rooms' => $rooms,
            'prices' => $prices,
            'picture' => $picture));

       return $addNewHotel;
    }    
    public function changeHotel($id) // Récupération d'un hotel pour le modifier
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, name, content, location, rooms, prices, picture FROM hotels WHERE id = ?');
        $req->execute(array($id));
        $changeHotel = $req->fetch();

        return $changeHotel;
    } 
    public function saveHotel($id, $name, $content, $location, $rooms, $prices) // Modification du contenu d'un hotel
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE hotels SET name = :name, content = :content, location = :location, rooms = :rooms, prices = :prices WHERE id = :id');
        $req->execute(array(
        	'name' => $name, 
        	'content' => $content,
        	'location' => $location,
        	'rooms' => $rooms,
        	'prices' => $prices, 
        	'id' => $id));

        return $req;
    }
    public function deleteHotel($id) // Supprimer un hotel 
    {
        $db = $this->dbConnect();
        $delete = $db->prepare('DELETE FROM hotels WHERE id = ?');
        $delete->execute(array($id));

        return $delete;
    }  
}