<?php
require_once(dirname(__FILE__).'/user.class.php');

// Le Data Access Objet
class UserDAO {
  private $conn;
  private $users;
  private $nbUsers;
  // Constructeur chargé d'ouvrir la BD
  public function __construct() {
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "projetshome";
    $this->conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

  }

  // Accès à un utilisateur
  function updateUsers() : void{
    $i = 0;
    $sql = "SELECT * FROM users";
    $pdo = $this->conn->query($sql);
    while($row = $pdo->fetch_assoc()){
      $user = new User($row['id_user'],$row['mail'],$row['nom'],$row['prenom'],$row['adresse'],$row['tel'],$row['mdp'],$row['codePostal'],$row['type']);
      $this->users[$i]=$user;
      $i++;
    }
    $this->nbUsers = $i;
  }

  function getUsers() : Array {
    return $this->users;
  }

  function getUserByMail(string $mail) : User {
    foreach ($this->users as $user) {
      if ($user->getMail() == $mail) {
        break 1;
      }
    }
    return $user;
  }

  function getUserById(int $id) : User {
    $sql = "SELECT * FROM users WHERE id_user=$id";
    $row = $this->conn->query($sql)->fetch_assoc();
    $user = new User($row['id_user'],$row['mail'],$row['nom'],$row['prenom'],$row['adresse'],$row['tel'],$row['mdp'],$row['codePostal'],$row['type']);
    return $user;
  }

  function getNbUsers() : int {
    return $this->nbUsers;
  }

  //Ajouter un nouveau utilisateur a la bd
  function addUser($mail,$nom,$prenom,$adresse,$tel,$mdp,$codePostal,$type) : void {
    $sql = "INSERT INTO users (mail,nom,prenom,adresse,codePostal,tel,mdp,"."type) VALUES (?,?,?,?,?,?,?,?)";
    $req = $this->conn->prepare($sql);
    $req->bind_param("ssssiiss",$mail,$nom,$prenom,$adresse,$codePostal,$tel,$mdp,$type);
    $req->execute();
    $this->updateUsers();
  }

  function modifTel($tel,$user) : void {
    $id = $user->getId();
    $sql = "UPDATE users SET tel = $tel WHERE id_user = $id";
    $this->conn->query($sql);
  }

  function modifAdresse($adresse,$user) : void {
    $id = $user->getId();
    $sql = "UPDATE users SET adresse='$adresse' WHERE id_user = $id";
    $this->conn->query($sql);


    //Problem = il update que des int
  }

  function modifCodePostal($CodePostal,$user) : void {
    $id = $user->getId();
    $sql = "UPDATE users SET codePostal = $CodePostal WHERE id_user = $id";
    $this->conn->query($sql);
  }

  function modifMdp($mdp,$user) : void {
    $id = $user->getId();
    $sql = "UPDATE users SET mdp='$mdp' WHERE id_user = $id";
    $this->conn->query($sql);
  }

  function mailExist($mail) : int {
    $val = 0;
    foreach ($this->users as $user) {
      if($user->getMail() == $mail){
        $val = 1;
        break 1;
      }else{
        $val = 0;
      }
    }
    return $val;
  }

  function telExist($tel) : int {
    $val = 0;
    foreach ($this->users as $user) {
      if($user->getTel() == $tel){
        $val = 1;
        break 1;
      }else{
        $val = 0;
      }
    }
    return $val;
  }

  function CloseCon() : void {
   $this->conn -> close();
   }
}

?>
