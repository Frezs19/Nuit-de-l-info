<?php

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

require_once(dirname(__FILE__).'/listProduits.class.php');
require_once(dirname(__FILE__).'/produit.class.php');
require_once(dirname(__FILE__).'/annonce.class.php');
require_once(dirname(__FILE__).'/user.class.php');

// require '/usr/share/php/PHPMailer/src/Exception.php';
// require '/usr/share/php/PHPMailer/src/PHPMailer.php';
// require '/usr/share/php/PHPMailer/src/SMTP.php';

class ListDAO {

  private $db;

  //Connexion à la base de données
  public function __construct() {
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "projetshome";
    $this->db = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("conect failed: %s\n". $db -> error);
  }

  //Ajouter une liste dans la base données
  function addList(int $idClient,array $contenu) : void {

    $prixTotal=0.0;
    for($i=1;$i<=max(array_keys($contenu));$i++){
      if (isset($contenu[$i])){
        $prixTotal+=max($contenu[$i]["substituant"]["prixMax"],$contenu[$i]["principal"]["prixMax"]);
      }
    }

    $sql="INSERT INTO lists (id_user,id_benevole,dateCreation,dateModification,etat,favoris,prixTotal) VALUES ('$idClient','0',CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP(),'Postee',0,$prixTotal)";
    $this->db->query($sql); 
    $idListe=$this->db->insert_id;   
    
    for($i=1;$i<=max(array_keys($contenu));$i++){
      if (isset($contenu[$i])){
        $nom=$contenu[$i]["principal"]["nom"];
        $prixMax=$contenu[$i]["principal"]["prixMax"];
        $marque=$contenu[$i]["principal"]["marque"];
        $quantite=$contenu[$i]["principal"]["quantite"];
        $nomSubstitut=$contenu[$i]["substituant"]["nom"];
        $prixMaxSubstitut=$contenu[$i]["substituant"]["prixMax"];
        $marqueSubstitut=$contenu[$i]["substituant"]["marque"];
        $quantiteSubstitut=$contenu[$i]["substituant"]["quantite"];

        //Requête préparé pour parer aux injections SQL
        $sql="INSERT INTO products values(?,?,?,?,?,?,?,?,?,null)";
        $req=$this->db->prepare($sql);
        $req->bind_param("ssssssssi",$nom,$prixMax,$marque,$quantite,$nomSubstitut,$prixMaxSubstitut,$marqueSubstitut,$quantiteSubstitut,$idListe);
        $req->execute();
      }
    }
  }

  //Supprimer une liste de la base données
  function supprimerListe(int $id_list) : void {
    $sql="DELETE from products where idListe=$id_list";
    $this->db->query($sql);
    $sql="DELETE from lists where id_list=$id_list";
    $this->db->query($sql);
  }

  //Modifier une liste
  function updateList(int $idList,array $contenu) : void {

    $prixTotal=0.0;
    for($i=1;$i<=max(array_keys($contenu));$i++){
      if (isset($contenu[$i])){
        $prixTotal+=max($contenu[$i]["substituant"]["prixMax"],$contenu[$i]["principal"]["prixMax"]);
      }
    }

    $sql="UPDATE lists SET dateModification=CURRENT_TIMESTAMP(),prixTotal=$prixTotal WHERE id_List=$idList";
    $this->db->query($sql);

    $sql="DELETE from products WHERE idListe=$idList";
    $this->db->query($sql);
    
    for($i=1;$i<=max(array_keys($contenu));$i++){
      if (isset($contenu[$i])){
        $nom=$contenu[$i]["principal"]["nom"];
        $prixMax=$contenu[$i]["principal"]["prixMax"];
        $marque=$contenu[$i]["principal"]["marque"];
        $quantite=$contenu[$i]["principal"]["quantite"];
        $nomSubstitut=$contenu[$i]["substituant"]["nom"];
        $prixMaxSubstitut=$contenu[$i]["substituant"]["prixMax"];
        $marqueSubstitut=$contenu[$i]["substituant"]["marque"];
        $quantiteSubstitut=$contenu[$i]["substituant"]["quantite"];

        //Requête préparé pour parer aux injections SQL
        $sql="INSERT INTO products values(?,?,?,?,?,?,?,?,?,null)";
        $req=$this->db->prepare($sql);
        $req->bind_param("ssssssssi",$nom,$prixMax,$marque,$quantite,$nomSubstitut,$prixMaxSubstitut,$marqueSubstitut,$quantiteSubstitut,$idList);
        $req->execute();
      }
    }
  }

  //Accéder à une liste grâce à son identifiant
  function getListById(int $idList) : listProduits {

    $products=array();

    $sql="SELECT * from products where idListe=$idList";
    $req=$this->db->query($sql);
    $res=$req->fetch_all(MYSQLI_ASSOC);

    foreach($res as $p){
      $product= new produit($p["nom"],$p["prixMax"],$p["marque"],$p["quantite"],$p["nomSubstitut"],$p["prixMaxSubstitut"],$p["marqueSubstitut"],$p["quantiteSubstitut"],$p["idListe"]);
      $products[]=$product;
    }

    $sql="SELECT * from lists where id_List=$idList";
    $req=$this->db->query($sql);
    $res=$req->fetch_assoc();
    $list = new listProduits($res["id_list"],$res["id_user"],$res["id_benevole"],$res["dateCreation"],$res["dateModification"],$res["etat"],$products,$res["favoris"],$res["prixTotal"]);

    return $list;

  }

  //Fonctions pour le benevole

  //Consulter les listes proches (même code postal)
  function getListesProches(int $codePostal) : array {
    $annonces = array();
    $sql="SELECT id_list,lists.id_user from lists,users where users.codePostal=$codePostal and lists.id_user=users.id_user and etat='Postee' order by dateCreation desc";
    $req=$this->db->query($sql);
    $res=$req->fetch_all();
    for($i=0;$i<count($res);$i++){
      $id=intval($res[$i][0]);
      $idClient=intval($res[$i][1]);
      $list = $this->getListById($id);
      $user = $this->getuserById($idClient);
      $annonces[] = new Annonce($user,$list);
    }
    return $annonces;
  }

  //Accéder aux listes acceptées par le bénévole
  function getListesEnCoursBenevole(int $idBenevole) : array {
    $annonces = array();
    $sql="SELECT id_list,id_user from lists where id_Benevole=$idBenevole and etat='En cours' order by dateCreation desc";
    $req=$this->db->query($sql);
    $res=$req->fetch_all();
    for($i=0;$i<count($res);$i++){
      $id=intval($res[$i][0]);
      $idClient=intval($res[$i][1]);
      $list = $this->getListById($id);
      $user = $this->getuserById($idClient);
      $annonces[] = new Annonce($user,$list);
    }
    return $annonces;
  }

  //Accéder aux listes terminées par le bénévole
  function getListesTermineesBenevole(int $idBenevole) : array {
    $annonces = array();
    $sql="SELECT id_list,id_user from lists where id_benevole=$idBenevole and etat='Terminee' order by favoris desc,dateCreation desc";
    $req=$this->db->query($sql);
    $res=$req->fetch_all();
    for($i=0;$i<count($res);$i++){
      $id=intval($res[$i][0]);
      $idClient=intval($res[$i][1]);
      $list = $this->getListById($id);
      $user = $this->getuserById($idClient);
      $annonces[] = new Annonce($user,$list);
    }
    return $annonces;
  }


  //Accepter une liste
  function accepterListe(int $idBenevole,int $idListe) : void {
    $sql="UPDATE lists set etat='En cours',id_benevole='$idBenevole' where id_list=$idListe";
    $req=$this->db->query($sql);
    if($req){
      //$this->emailListeAccepter($idBenevole,$idListe);
    }
  }

  //Annuler la livraison d'un liste
  function annulerListe(int $idBenevole,int $idListe) : void {
    $sql="UPDATE lists set etat='Postee',id_benevole=0 where id_list=$idListe";
    $req=$this->db->query($sql);
    if($req){
      //$this->emailListeAnulee($idBenevole,$idListe);
    }
  }

  //Fonctions pour le client

  //Accéder aux listes postées par le client
  function getListesPostees(int $idClient) : array {
    $annonces = array();
    $sql="SELECT id_list,id_user from lists where id_user=$idClient and etat='Postee' order by dateCreation desc";
    $req=$this->db->query($sql);
    $res=$req->fetch_all();
    for($i=0;$i<count($res);$i++){
      $id=intval($res[$i][0]);
      $idClient=intval($res[$i][1]);
      $list = $this->getListById($id);
      $user = $this->getuserById($idClient);
      $annonces[] = new Annonce($user,$list);
    }
    return $annonces;
  }

  //Accéder aux listes du client acceptées par un bénévole
  function getListesEnCoursClient(int $idClient) : array {
    $annonces = array();
    $sql="SELECT id_list,id_user from lists where id_user=$idClient and etat='En cours' order by dateCreation desc";
    $req=$this->db->query($sql);
    $res=$req->fetch_all();
    for($i=0;$i<count($res);$i++){
      $id=intval($res[$i][0]);
      $idClient=intval($res[$i][1]);
      $list = $this->getListById($id);
      $user = $this->getuserById($idClient);
      $annonces[] = new Annonce($user,$list);
    }
    return $annonces;
  }

  //Accéder aux listes terminées du client
  function getListesTermineesClient(int $idClient) : array {
    $annonces = array();
    $sql="SELECT id_list,id_user from lists where id_user=$idClient and etat='Terminee' order by favoris desc,dateCreation desc";
    $req=$this->db->query($sql);
    $res=$req->fetch_all();
    for($i=0;$i<count($res);$i++){
      $id=intval($res[$i][0]);
      $idClient=intval($res[$i][1]);
      $list = $this->getListById($id);
      $user = $this->getuserById($idClient);
      $annonces[] = new Annonce($user,$list);
    }
    return $annonces;
  }

  //Accéder aux listes favorites du client
  function getListesFavorites(int $idClient) : array {
    $annonces = array();
    $sql="SELECT id_list,id_user from lists where id_user=$idClient and favoris=1 order by favoris desc,dateCreation desc";
    $req=$this->db->query($sql);
    $res=$req->fetch_all();
    for($i=0;$i<count($res);$i++){
      $idListe=intval($res[$i][0]);
      $idClient=intval($res[$i][1]);
      $list = $this->getListById($idListe);
      $user = $this->getuserById($idClient);
      $annonces[] = new Annonce($user,$list);
    }
    return $annonces;
  }

  //Ajouter une liste aux favoris
  function supprimerFavoris(int $idListe) : void {
    $sql="UPDATE lists set favoris=0 where id_list=$idListe";
    $req=$this->db->query($sql);
  }

  //Supprimer une liste des favoris
  function ajouterFavoris(int $idListe) : void {
    $sql="UPDATE lists set favoris=1 where id_list=$idListe";
    $req=$this->db->query($sql);
  }


  //Fonctions communes au bénévole et au client

  //Terminer une liste (confirmer la livraison)
  function terminerListe(int $idListe) : void {
    $sql="UPDATE lists set etat='Terminee' where id_list=$idListe";
    $req=$this->db->query($sql);
  }


  //Recupérer un user en fonction de son ID
  function getUserById(int $idUser) : User {
    $sql = "SELECT * FROM users WHERE id_user=$idUser";
    $req=$this->db->query($sql);
    $row = $req->fetch_assoc();
    $user = new User($row['id_user'],$row['mail'],$row['nom'],$row['prenom'],$row['adresse'],$row['tel'],$row['mdp'],$row['codePostal'],$row['type']);
    return $user;
  }

  //Envoyer un email à un client lorsqu'un bénévole accepte sa liste de course
  function emailListeAccepter(int $idBenevole, int $idList) :void {

    $sql = "SELECT id_user FROM lists WHERE id_list=$idList";
    $req=$this->db->query($sql);
    $res=$req->fetch_all();
    $idClient=intval($res[0][0]);
    $client = $this->getUserById($idClient);
    $benevole = $this->getuserById($idBenevole);

    $mail = new PHPMailer();
    $mail->IsSMTP();                       // telling the class to use SMTP
    $mail->SMTPDebug = 0;                  
    // 0 = no output, 1 = errors and messages, 2 = messages only.
    $mail->SMTPAuth = true;                // enable SMTP authentication
    $mail->SMTPSecure = "tls";              // sets the prefix to the servier
    $mail->Host = "smtp.gmail.com";        // sets Gmail as the SMTP server
    $mail->Port = 587;                     // set the SMTP port for the GMAIL
    $mail->Username = "mdseconemail";  // Gmail username
    $mail->Password = "mdseconemail123";      // Gmail password
    $mail->CharSet = 'utf-8';
    $mail->SetFrom ('shome@noreply.com', 'Shome.com Information');

    $mail->Subject = "Liste acceptée sur Shome";
    $mail->ContentType = 'text/plain';
    $mail->IsHTML(false);

    $message="Bonjour,\n";
    $message.="Votre liste n° $idList a été prise en charge par ".$benevole->getNomPrenom().".\n";
    $message.="Vous pouvez consulter son profil en vous rendant sur votre page mes listes dans la section liste en cours et en cliquant sur \"Voir le profil du bénévole\".\n";
    $message .= "Afin de livrer votre commande dans les plus bref délais, nous vous conseillons de rester joignable pour que ".$benevole->getNomPrenom()." puisse vous contacter en cas de complication lors de l'achat des produits ou lors de la livraison de votre commande.\n";
    $message .= "Notre bénévole et l'équipe Shome vous remercie pour votre compréhension.\n";
    $message .= "\nL'équipe Shome\n";
    $message .= "https://2.7.7.134";

    $mail->Body = $message;
    $mail->AddAddress ($client->getMail(), 'Recipients Name');      

    if(!$mail->Send())
    {
      $error_message = "Mailer Error: " . $mail->ErrorInfo;
    } else 
    {
      $error_message = "Successfully sent!";
    }
    
  }


    //Envoyer un email à un client lorsqu'un bénévole accepte sa liste de course
    function emailListeAnulee(int $idBenevole, int $idList) :void {

      $sql = "SELECT id_user FROM lists WHERE id_list=$idList";
      $req=$this->db->query($sql);
      $res=$req->fetch_all();
      $idClient=intval($res[0][0]);
      $client = $this->getUserById($idClient);
      $benevole = $this->getuserById($idBenevole);
  
      $mail = new PHPMailer();
      $mail->IsSMTP();                       // telling the class to use SMTP
      $mail->SMTPDebug = 0;                  
      // 0 = no output, 1 = errors and messages, 2 = messages only.
      $mail->SMTPAuth = true;                // enable SMTP authentication
      $mail->SMTPSecure = "tls";              // sets the prefix to the servier
      $mail->Host = "smtp.gmail.com";        // sets Gmail as the SMTP server
      $mail->Port = 587;                     // set the SMTP port for the GMAIL
      $mail->Username = "mdseconemail";  // Gmail username
      $mail->Password = "mdseconemail123";      // Gmail password
      $mail->CharSet = 'utf-8';
      $mail->SetFrom ('shome@noreply.com', 'Shome.com Information');
  
      $mail->Subject = "Livraison annulée sur Shome";
      $mail->ContentType = 'text/plain';
      $mail->IsHTML(false);
  
      $message="Bonjour,\n";
      $message.="Le bénévole ".$benevole->getNomPrenom()." qui devait livrer la liste n° $idList ne peut finalement pas vous livrer.\n";
      $message.="Nous sommes desolé pour cela.\n";
      $message.="Votre liste a été remise dans les listes postées en attente de l'acceptation d'un bénévole.\n";
      $message.="Vous pouvez vous rendre sur la page mes listes dans la section lsite postées pour supprimer ou modifier cette liste.\n";
      $message .= "Notre bénévole et l'équipe Shome vous remercie pour votre compréhension.\n";
      $message .= "\nL'équipe Shome\n";
      $message .= "https://2.7.7.134";
  
      $mail->Body = $message;
      $mail->AddAddress ($client->getMail(), 'Recipients Name');      
  
      if(!$mail->Send())
      {
        $error_message = "Mailer Error: " . $mail->ErrorInfo;
      } else 
      {
        $error_message = "Successfully sent!";
      }
      
    }


  //Supprime un utilisateur ainsi que toutes ses listes et produits
  function deleteUser(int $idUser){
    $this->db->begin_transaction();
    try{
      //Supprime les listes du client
      $sql="SELECT id_list from lists where id_user=$idUser";
      $req=$this->db->query($sql);
      $res=$req->fetch_all();
      for($i=0;$i<count($res);$i++){
        $sql="DELETE from products where idliste=".$res[$i][0];
        $req=$this->db->query($sql);
        $sql="DELETE from lists where id_list=".$res[$i][0];
        $req=$this->db->query($sql);
      }
      //Supprimer les livraisons du bénévole
      $sql="SELECT id_list from lists where id_benevole=$idUser";
      $req=$this->db->query($sql);
      $res=$req->fetch_all();
      for($i=0;$i<count($res);$i++){
        $this->annulerListe($idUser,$res[$i][0]);
      }
      $sql="DELETE from users where id_user=$idUser";
      $req=$this->db->query($sql);
      $this->db->commit();
    } catch (mysqli_sql_exception $exception) {
        $mysqli->rollback();
    }
  }

}
?>
