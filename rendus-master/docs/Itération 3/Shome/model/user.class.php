<?php

// Description d'un utilisateur
class User {
  private $id;
  private $mail;
  private $nom;
  private $prenom;
  private $adresse;
  private $tel;
  private $mdp;
  private $codePostal;
  private $type;

  public function __construct(int $id=0,string $mail='',string $nom='',string $prenom='',string $adresse='',int $tel=0, string $mdp='', int $codePostal=0,string $type='') {
    $this->id = $id;
    $this->mail = $mail;
    $this->nom = $nom;
    $this->prenom = $prenom;
    $this->adresse = $adresse;
    $this->tel = $tel;
    $this->mdp = $mdp;
    $this->codePostal= $codePostal;
    $this->type=$type;
  }
  
  function getId(){
    return $this->id;
  }
  function getMail(){
    return $this->mail;
  }
  function getNom(){
    return $this->nom;
  }
  function getPrenom(){
    return $this->prenom;
  }
  function getAdresse(){
    return $this->adresse;
  }
  function getTel(){
    return $this->tel;
  }
  function getMdp(){
    return $this->mdp;
  }
  function getCodePostal(){
    return $this->codePostal;
  }
  function getType(){
    return $this->type;
  }
  function getNomPrenom(){
    return $this->prenom." ".$this->nom;
  }

}

?>
