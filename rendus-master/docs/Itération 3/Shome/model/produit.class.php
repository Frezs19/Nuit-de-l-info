<?php


class Produit{

    private $nom;
    private $prixMax;
    private $marque;
    private $quantite;
    private $nomSubstitut;
    private $prixMaxSubstitut;
    private $marqueSubstitut;
    private $quantiteSubstitut;
    private $idListe;

    public function __construct(string $nom="default",string $prixMax="0 euros",string $marque="default",string $quantite="default",string $nomSubstitut="default",string $prixMaxSubstitut="0 euros",string $marqueSubstitut="default",string $quantiteSubstitut="default",int $idListe=0){
        $this->nom=$nom;
        $this->prixMax=$prixMax;
        $this->marque=$marque;
        $this->quantite=$quantite;
        $this->nomSubstitut=$nomSubstitut;
        $this->prixMaxSubstitut=$prixMaxSubstitut;
        $this->marqueSubstitut=$marqueSubstitut;
        $this->quantiteSubstitut=$quantiteSubstitut;
        $this->idListe=$idListe;
    }


    function getNom(): string{
        return $this->nom;
    }

    function getPrixMax(): string{
        return $this->prixMax;
    }

    function getMarque(): string{
        return $this->marque;
    }

    function getQuantite(): string{
        return $this->quantite;
    }

    function getNomSubstitut(): string{
        return $this->nomSubstitut;
    }

    function getPrixMaxSubstitut(): string{
        return $this->prixMaxSubstitut;
    }

    function getMarqueSubstitut(): string{
        return $this->marqueSubstitut;
    }

    function getQuantiteSubstitut(): string{
        return $this->quantiteSubstitut;
    }

    function getIdListe(): int{
        return $this->idListe;
    }

}


?>