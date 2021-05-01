<?php
namespace app\model;

require "vendor/autoload.php";
use app\model\Manager;

class MemberManager extends Manager 
{
    // PAGE INSCRIPTION
    public function verifyPseudo($pseudo) // Vérification du pseudo existant avant de valider l'inscription
    {
        $db = $this->dbConnect();
        $req = $db->query("SELECT pseudo FROM members WHERE pseudo = '" . $pseudo . "'"); 
        $req->execute();

        return $req;
    }
    public function verifyEmail($email) // Vérification du pseudo existant
    {
        $db = $this->dbConnect();
        $req = $db->query("SELECT email FROM members WHERE email = '" . $email . "'"); 
        $req->execute();

        return $req;
    }
    public function insertMember($pseudo, $pass, $email) // Inscription
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO members(pseudo, pass, email) VALUES(:pseudo, :pass, :email)');
        $req->execute(array(
            'pseudo' => $pseudo,
            'pass' => password_hash($pass, PASSWORD_DEFAULT),
            'email' => $email));
    }

    // PAGE CONNEXION

    public function connectMember($pseudo) // Récupération de l'utilisateur déjà inscrit 
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT pseudo, pass, id, admin FROM members WHERE pseudo = :pseudo');
        $req->execute(array(
            'pseudo' => $pseudo));

        return $req;
    }

    // PAGE PROFILE
    public function openImg($id) // Récupération de l'image de profile
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, picture FROM members WHERE id = ?');
        $req->execute(array($id));

        return $req;    	
    }
    public function addPicture($id, $picture) // Ajout d'une image de profile 
    {
       $db = $this->dbConnect();
       $profile = $db->prepare('UPDATE members SET picture = :picture WHERE id = :id');
       $pictureProfile = $profile->execute(array(
            'picture' => $picture,
        	'id' => $id));

       return $pictureProfile;
    }
}