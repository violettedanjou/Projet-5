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

        //$servicesHotel = array('swimming_pool', 'beach_access', 'car_park', 'free_wifi', 'restaurant', 'family_rooms', 'television', 'airport_shuttle', 'air_conditioner', 'no_smokers', 'animals', 'strongbox', 'mini_bar', 'luggage', 'elevator', 'sauna');

        for ($i = 0; $i <= 16 ; $i++) { 
        	// Piscine
	       	if ($services[0] == 1) {
	       		$swimming_pool = 1;
	       	}
	       	else {
	       		$swimming_pool = 0;
	       	}

	       	// Accès plage
	       	if ($services[0] == 2) {
	       		$beach_access = 1;
	       	}
	       	else {
	       		$beach_access = 0;
	       	}

	       	//Parking
	       	if ($services[0] == 3) {
	       		$car_park = 1;
	       	}
	       	else {
	       		$car_park = 0;
	       	}

	       	// Wifi 
	       	if ($services[0] == 4) {
	       		$free_wifi = 1;
	       	}
	       	else {
	       		$free_wifi = 0;
	       	}

	       	// Restaurant
	       	if ($services[0] == 5) {
	       		$restaurant = 1;
	       	}
	       	else {
	       		$restaurant = 0;
	       	}

	       	// Chambres familiales
	       	if ($services[0] == 6) {
	       		$family_rooms = 1;
	       	}
	       	else {
	       		$family_rooms = 0;
	       	}

	       	// Télévision
	       	if ($services[0] == 7) {
	       		$television = 1;
	       	}
	       	else {
	       		$television = 0;
	       	}

	       	// Navette
	       	if ($services[0] == 8) {
	       		$airport_shuttle = 1;
	       	}
	       	else {
	       		$airport_shuttle = 0;
	       	}

	       	// Air conditionné
	       	if ($services[0] == 9) {
	       		$air_conditioner = 1;
	       	}
	       	else {
	       		$air_conditioner = 0;
	       	}

	       	// Non fumeurs
	       	if ($services[0] == 10) {
	       		$no_smokers = 1;
	       	}
	       	else {
	       		$no_smokers = 0;
	       	}

	       	// Animaux 
	       	if ($services[0] == 11) {
	       		$animals = 1;
	       	}
	       	else {
	       		$animals = 0;
	       	}

	       	// Coffre fort
	       	if ($services[0] == 12) {
	       		$strongbox = 1;
	       	}
	       	else {
	       		$strongbox = 0;
	       	}

	       	// Mini bar
	       	if ($services[0] == 13) {
	       		$mini_bar = 1;
	       	}
	       	else {
	       		$mini_bar = 0;
	       	}

	       	// Baggage
	       	if ($services[0] == 14) {
	       		$luggage = 1;
	       	}
	       	else {
	       		$luggage = 0;
	       	}

	       	// Ascenseur
	       	if ($services[0] == 15) {
	       		$elevator = 1;
	       	}
	       	else {
	       		$elevator = 0;
	       	}

	       	// Sauna
	       	if ($services[0] == 16) {
	       		$sauna = 1;
	       	}
	       	else {
	       		$sauna = 0;
	       	}
        }

        $addNewHotel = $newHotel->execute(array(
            'name' => $name,
            'content' => $content,
            'location' => $location,
            'rooms' => $rooms,
            'prices' => $prices,
            'swimming_pool' => $swimming_pool, 
        	'beach_access' => $beach_access,
        	'car_park' => $car_park,
        	'free_wifi' => $free_wifi,
        	'restaurant' => $restaurant, 
        	'family_rooms' => $family_rooms, 
        	'television' => $television,
        	'airport_shuttle' => $airport_shuttle,
        	'air_conditioner' => $air_conditioner,
        	'no_smokers' => $no_smokers,
        	'animals' => $animals,
        	'strongbox' => $strongbox, 
        	'mini_bar' => $mini_bar,
        	'luggage' => $luggage,
        	'elevator' => $elevator,
        	'sauna' => $sauna,
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