<?php


class Annonce {

    private $client;
    private $liste;
    private $distance;

    public function __construct(user $client,listProduits $liste,float $distance=0){
        $this->client=$client;
        $this->liste=$liste;
        $this->distance=$distance;
    }

    function getClient() : user {
        return $this->client;
    }

    function getListe() : listProduits {
        return $this->liste;
    }

    function getDistance() : float {
        return $this->distance;
    }

}


?>