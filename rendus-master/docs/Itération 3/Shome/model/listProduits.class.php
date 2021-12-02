<?php


// Description d'une liste
class ListProduits {
  private $id_list;
  private $id_user;
  private $id_benevole;
  private $dateCreation;
  private $dateModification;
  private $etat;
  private $listProduits;
  private $favoris;
  private $prixTotal;

  public function __construct(int $id_list=0,int $id_user=0,int $id_benevole=0,string $dateCreation='',string $dateModification='',string $etat='En Cours',array $listProduits, int $favoris=0,float $prixTotal=0) {
    $this->id_list = $id_list;
    $this->id_user = $id_user;
    $this->id_benevole= $id_benevole;
    $this->dateCreation = $dateCreation;
    $this->dateModification = $dateModification;
    $this->etat = $etat;
    $this->listProduits = $listProduits;
    $this->favoris = $favoris;
    $this->prixTotal = $prixTotal;
  }

  function getIdList() : int {
    return $this->id_list;
  }
  function getIdUser() : int {
    return $this->id_user;
  }
  function getIdBenevole() : int {
    return $this->id_benevole;
  }
  function getDateCreation() : string {
    return $this->dateCreation;
  }
  function getDateModification() : string {
    return $this->dateModification;
  }
  function getEtat() : string {
    return $this->etat;
  }
  function getListProduits() : array {
    return $this->listProduits;
  }
  function getFavoris() : int {
    return $this->favoris;
  }
  function getPrixTotal() : float {
    return $this->prixTotal;
  }


}

?>
