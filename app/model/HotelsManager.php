<?php
namespace app\model;

require "vendor/autoload.php";
use app\model\Manager;

class HotelsManager extends Manager 
{
    public function getHotels($start, $hotelsOfPage) // Récupération des hotels
    {
        $db = $this->dbConnect();
        $listhotels = $db->query('SELECT id, name, content, location, rooms, prices, picture FROM hotels ORDER BY id ASC LIMIT '. $start . ' , '. $hotelsOfPage);

        return $listhotels;
    }
	// PAGINATION 	
    public function allHotels() // Compter le nombre d'activités au total
    {
        $db = $this->dbConnect();
        $allHotels = $db->query('SELECT COUNT(*) AS nbrHotels FROM hotels');

        return $allHotels;
    } 



    public function getHotel($id) // Récupération d'un hotel grace à son id
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, name, content, location, rooms, prices, /*swimming_pool,*/ picture FROM hotels WHERE id = ?');
        $req->execute(array($id));
        $hotel = $req->fetch();
        //die(var_dump($hotel));
        return $hotel;
    }
/*    public function getServices($id) // Afficher les services
    {
        $db = $this->dbConnect();
        $services = $db->prepare('UPDATE hotels SET swimming_pool = 1, beach_access = 1, car_park = 1, free_wifi = 1, restaurant = 1, family_rooms = 1, television = 1, airport_shuttle = 1, air_conditioner = 1, no_smokers = 1, animals = 1, strongbox = 1, mini_bar = 1, luggage = 1, elevator = 1, sauna = 1 WHERE id = ?');
        $services->execute(array($id));
        //die(var_dump($services));

        return $services;
    }    */


/*  
    public function getServices($id) // Afficher les services
    {
        $db = $this->dbConnect();
        $services = $db->prepare('UPDATE hotels SET swimming_pool = 1, beach_access = 1, car_park = 1, free_wifi = 1, restaurant = 1, family_rooms = 1, television = 1, airport_shuttle = 1, air_conditioner = 1, no_smokers = 1, animals = 1, strongbox = 1, mini_bar = 1, luggage = 1, elevator = 1, sauna = 1 WHERE id = ?');
        $services->execute(array($id));
        //die(var_dump($services));

        return $services;
    }

	public function getservices()
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE hotels SET swimming_pool = :swimming_pool, beach_access = :beach_access, car_park = :car_park, free_wifi = :free_wifi, restaurant = :restaurant, family_rooms = :family_rooms, television = :television, airport_shuttle = :airport_shuttle, air_conditioner = :air_conditioner, no_smokers = :no_smokers, animals = :animals, strongbox = :strongbox, mini_bar = :mini_bar, luggage = :luggage, elevator = :elevator, sauna = :sauna WHERE id = :id');
        $req->execute(array(
        	'swimming_pool' => $swimming_pool, 
        	'beach_access' => $beach_access,
        	'car_park' => $car_park,
        	'free_wifi' => $free_wifi,
        	'restaurant' => $restaurant, 
        	'family_rooms' => $family_rooms, 
        	'television' => $television,
        	'airport_shuttle' => $airport_shuttle,
        	'no_smokers' => $no_smokers,
        	'animals' => $animals,
        	'strongbox' => $strongbox, 
        	'mini_bar' => $mini_bar,
        	'luggage' => $luggage,
        	'elevator' => $elevator,
        	'sauna' => $sauna,       	
        	'id' => $id));

        return $req;    	
    }
*/     
    public function addNewHotel($name, $content, $location, $rooms, $prices, $services, $picture) // Ajout d'un nouvel hotel
    {
        $db = $this->dbConnect();
        $newHotel = $db->prepare('INSERT INTO hotels(name, content, location, rooms, prices, swimming_pool, beach_access, car_park, free_wifi, restaurant, family_rooms, television, airport_shuttle, air_conditioner, no_smokers, animals, strongbox, mini_bar, luggage, elevator, sauna, picture) VALUES (:name, :content, :location, :rooms, :prices, :swimming_pool, :beach_access, :car_park, :free_wifi, :restaurant, :family_rooms, :television, :airport_shuttle, :air_conditioner, :no_smokers, :animals, :strongbox, :mini_bar, :luggage, :elevator, :sauna, :picture)');
       //var_dump($services);
       //die(var_dump($newHotel));

	       //$swimming_pool = 0;
	       if ($services[0] == 1) {
	       	  $swimming_pool = 1;
	       }
	       else {
	       	$swimming_pool = 0;
	       }

        $addNewHotel = $newHotel->execute(array(
            'name' => $name,
            'content' => $content,
            'location' => $location,
            'rooms' => $rooms,
            'prices' => $prices,
            'swimming_pool' => $swimming_pool, 
        	'beach_access' => $services,
        	'car_park' => $services,
        	'free_wifi' => $services,
        	'restaurant' => $services, 
        	'family_rooms' => $services, 
        	'television' => $services,
        	'airport_shuttle' => $services,
        	'no_smokers' => $services,
        	'animals' => $services,
        	'strongbox' => $services, 
        	'mini_bar' => $services,
        	'luggage' => $services,
        	'elevator' => $services,
        	'sauna' => $services,
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