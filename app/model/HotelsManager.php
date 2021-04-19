<?php
namespace app\model;

require "vendor/autoload.php";
use app\model\Manager;

class HotelsManager extends Manager 
{
    public function getHotels() // Récupération les 4 premiers hotels sur page d'accueil
    {
        $db = $this->dbConnect();
        $listhotels = $db->query('SELECT id, name, content, location, rooms, prices, picture FROM hotels ORDER BY id ASC LIMIT 0, 4');

        return $listhotels;
    }

// Page avec liste des hotels + PAGINATION 
    public function allHotels() // Compter le nombre d'hotels au total
    {
        $db = $this->dbConnect();
        $allHotels = $db->query('SELECT COUNT(*) AS nbrHotels FROM hotels');

        return $allHotels;
    } 	
	public function getList($start, $hotelsOfPage) // Récupération des hotels
    {
        $db = $this->dbConnect();
        $listhotels = $db->query('SELECT id, name, content, location, rooms, prices, picture FROM hotels ORDER BY id ASC LIMIT '. $start . ' , '. $hotelsOfPage);

        return $listhotels;
    }
    // Page d'un hotel en particulier
    public function getHotel($id) // Récupération d'un hotel grace à son id
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, name, content, location, rooms, prices, swimming_pool, beach_access, car_park, free_wifi, restaurant, family_rooms, television, airport_shuttle, air_conditioner, no_smokers, animals, strongbox, mini_bar, luggage, elevator, sauna, picture FROM hotels WHERE id = ?');
        $req->execute(array($id));
        $hotel = $req->fetch();
        return $hotel;
    }


// AMINISTRATION
    public function getHotelsAdmin() // Récupération les 4 premiers hotels page d'accueil
    {
        $db = $this->dbConnect();
        $listhotels = $db->query('SELECT id, name, content, location, rooms, prices, picture FROM hotels ORDER BY id ASC');

        return $listhotels;
    }
    public function addNewHotel($name, $content, $location, $rooms, $prices, $services, $picture) // Ajout d'un nouvel hotel
    {
        $db = $this->dbConnect();
        $newHotel = $db->prepare('INSERT INTO hotels(name, content, location, rooms, prices, swimming_pool, beach_access, car_park, free_wifi, restaurant, family_rooms, television, airport_shuttle, air_conditioner, no_smokers, animals, strongbox, mini_bar, luggage, elevator, sauna, picture) VALUES (:name, :content, :location, :rooms, :prices, :swimming_pool, :beach_access, :car_park, :free_wifi, :restaurant, :family_rooms, :television, :airport_shuttle, :air_conditioner, :no_smokers, :animals, :strongbox, :mini_bar, :luggage, :elevator, :sauna, :picture)');

        $swimming_pool = 0;
        $beach_access = 0;
        $car_park = 0;
        $free_wifi = 0;
        $restaurant = 0;
        $family_rooms = 0;
        $television = 0;
        $airport_shuttle = 0;
        $air_conditioner = 0;
        $no_smokers = 0;
        $animals = 0;
        $strongbox = 0;
        $mini_bar = 0;
        $luggage = 0;
        $elevator = 0;
        $sauna = 0;

        for ($i = 0; $i < count($services) ; $i++) { 
        	// Piscine
	       	if ($services[$i] == 1) {
	       		$swimming_pool = 1;
	       	}

	       	// Accès plage
	       	if ($services[$i] == 2) {
	       		$beach_access = 1;
	       	}

	       	//Parking
	       	if ($services[$i] == 3) {
	       		$car_park = 1;
	       	}

	       	// Wifi 
	       	if ($services[$i] == 4) {
	       		$free_wifi = 1;
	       	}

	       	// Restaurant
	       	if ($services[$i] == 5) {
	       		$restaurant = 1;
	       	}

	       	// Chambres familiales
	       	if ($services[$i] == 6) {
	       		$family_rooms = 1;
	       	}

	       	// Télévision
	       	if ($services[$i] == 7) {
	       		$television = 1;
	       	}

	       	// Navette
	       	if ($services[$i] == 8) {
	       		$airport_shuttle = 1;
	       	}

	       	// Air conditionné
	       	if ($services[$i] == 9) {
	       		$air_conditioner = 1;
	       	}

	       	// Non fumeurs
	       	if ($services[$i] == 10) {
	       		$no_smokers = 1;
	       	}

	       	// Animaux 
	       	if ($services[$i] == 11) {
	       		$animals = 1;
	       	}

	       	// Coffre fort
	       	if ($services[$i] == 12) {
	       		$strongbox = 1;
	       	}

	       	// Mini bar
	       	if ($services[$i] == 13) {
	       		$mini_bar = 1;
	       	}

	       	// Baggage
	       	if ($services[$i] == 14) {
	       		$luggage = 1;
	       	}

	       	// Ascenseur
	       	if ($services[$i] == 15) {
	       		$elevator = 1;
	       	}

	       	// Sauna
	       	if ($services[$i] == 16) {
	       		$sauna = 1;
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


// MODIFICATION   

    public function changeHotel($id) // Récupération d'un hotel pour le modifier
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, name, content, location, rooms, prices, swimming_pool, beach_access, car_park, free_wifi, restaurant, family_rooms, television, airport_shuttle, air_conditioner, no_smokers, animals, strongbox, mini_bar, luggage, elevator, sauna, picture FROM hotels WHERE id = ?');
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
    public function changeImgHotel($id, $picture)
    {
    	$db = $this->dbConnect();
        $req = $db->prepare('UPDATE hotels SET picture = :picture WHERE id = :id');
        $changePicture = $req->execute(array(
        	'picture' => $picture, 
        	'id' => $id));

        return $changePicture;    	
    }
    public function changeServices($id, $services) // Modifier les services d'un nouvel hotel
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE hotels SET swimming_pool = :swimming_pool, beach_access = :beach_access, car_park = :car_park, free_wifi = :free_wifi, restaurant = :restaurant, family_rooms = :family_rooms, television = :television, airport_shuttle = :airport_shuttle, air_conditioner = :air_conditioner, no_smokers = :no_smokers, animals = :animals, strongbox = :strongbox, mini_bar = :mini_bar, luggage = :luggage, elevator = :elevator, sauna = :sauna WHERE id = :id');

        $swimming_pool = 0;
        $beach_access = 0;
        $car_park = 0;
        $free_wifi = 0;
        $restaurant = 0;
        $family_rooms = 0;
        $television = 0;
        $airport_shuttle = 0;
        $air_conditioner = 0;
        $no_smokers = 0;
        $animals = 0;
        $strongbox = 0;
        $mini_bar = 0;
        $luggage = 0;
        $elevator = 0;
        $sauna = 0;

        for ($i = 0; $i < count($services) ; $i++) { 
        	// Piscine
	       	if ($services[$i] == 1) {
	       		$swimming_pool = 1;
	       	}

	       	// Accès plage
	       	if ($services[$i] == 2) {
	       		$beach_access = 1;
	       	}

	       	//Parking
	       	if ($services[$i] == 3) {
	       		$car_park = 1;
	       	}

	       	// Wifi 
	       	if ($services[$i] == 4) {
	       		$free_wifi = 1;
	       	}

	       	// Restaurant
	       	if ($services[$i] == 5) {
	       		$restaurant = 1;
	       	}

	       	// Chambres familiales
	       	if ($services[$i] == 6) {
	       		$family_rooms = 1;
	       	}

	       	// Télévision
	       	if ($services[$i] == 7) {
	       		$television = 1;
	       	}

	       	// Navette
	       	if ($services[$i] == 8) {
	       		$airport_shuttle = 1;
	       	}

	       	// Air conditionné
	       	if ($services[$i] == 9) {
	       		$air_conditioner = 1;
	       	}

	       	// Non fumeurs
	       	if ($services[$i] == 10) {
	       		$no_smokers = 1;
	       	}

	       	// Animaux 
	       	if ($services[$i] == 11) {
	       		$animals = 1;
	       	}

	       	// Coffre fort
	       	if ($services[$i] == 12) {
	       		$strongbox = 1;
	       	}

	       	// Mini bar
	       	if ($services[$i] == 13) {
	       		$mini_bar = 1;
	       	}

	       	// Baggage
	       	if ($services[$i] == 14) {
	       		$luggage = 1;
	       	}

	       	// Ascenseur
	       	if ($services[$i] == 15) {
	       		$elevator = 1;
	       	}

	       	// Sauna
	       	if ($services[$i] == 16) {
	       		$sauna = 1;
	       	}
        }

        $changeServicesHotel = $req->execute(array(
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
            'id' => $id));

       return $changeServicesHotel;
    } 
    public function deleteHotel($id) // Supprimer un hotel 
    {
        $db = $this->dbConnect();
        $delete = $db->prepare('DELETE FROM hotels WHERE id = ?');
        $delete->execute(array($id));

        return $delete;
    }  
}