<?php
namespace app\model\MemberManager;

require "vendor/autoload.php";
use app\model\Manager;

class MemberManager extends Manager 
{
    // PAGE INSCRIPTION
    public function insertMember($pseudo, $pass, $email) // inscription
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO members(pseudo, pass, email, registration_date) VALUES(:pseudo, :pass, :email, CURDATE())');
        $req->execute(array(
            'pseudo' => $pseudo,
            'pass' => password_hash($pass, PASSWORD_DEFAULT),
            'email' => $email));
    }
    public function verifyPseudo($pseudo) // Vérification du pseudo existant
    {
        $db = $this->dbConnect();
        $req = $db->query("SELECT pseudo FROM members WHERE pseudo = '" . $pseudo . "'"); 
        $req->execute();

        return $req;
    }
    //PAGE CONNEXION
    public function connectMember($pseudo) //  Récupération de l'utilisateur déjà inscrit 
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT pseudo, pass, id, admin FROM members WHERE pseudo = :pseudo');
        $req->execute(array(
            'pseudo' => $pseudo));

        return $req;
    }
    public function addPicture($picture) // Ajout d'une image de profile 
    {
       $db = $this->dbConnect();
       $profile = $db->prepare('INSERT INTO members(picture) VALUES (:picture)');
       $pictureProfile = $profile->execute(array(
            'picture' => $picture));

       return $pictureProfile;
    }
}