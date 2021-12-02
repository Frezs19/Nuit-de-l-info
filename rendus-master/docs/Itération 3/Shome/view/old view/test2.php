<?php


function getDistance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371){

    $latFrom = deg2rad($latitudeFrom);
    $lonFrom = deg2rad($longitudeFrom);
    $latTo = deg2rad($latitudeTo);
    $lonTo = deg2rad($longitudeTo);
  
    $latDelta = $latTo - $latFrom;
    $lonDelta = $lonTo - $lonFrom;
  
    $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) + cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
    return $angle * $earthRadius;
}



$adresse1=$_GET["adresse1"];
$adresse2=$_GET["adresse2"];
$url1=rawurlencode($adresse1);
$url2=rawurlencode($adresse2);

$url = "http://dev.virtualearth.net/REST/V1/Routes/Walking?wp.0=$url1&wp.1=$url2&optmz=distance&key=Aqlp0E5DwZcIh_n7YvqLO3IK6AvgQ8MA3D2L-xRuFc66c9oLW2CmufisowR-KCQR";

$content = @file_get_contents($url);

if ($content===false){
    echo "Erreur de l'itineraire";
}else{
    $contentArray = json_decode($content, true);
    $distance = $contentArray["resourceSets"][0]["resources"][0]["travelDistance"];
    $time = $contentArray["resourceSets"][0]["resources"][0]["travelDuration"];
    $timeMin = $time/60;
    $min = intdiv($time,60);
    $sec = ($time/60-$min)*60;



    echo "Distance entre $adresse1 et $adresse2 : $distance km";
    echo"<br>";
    echo "Durée : $min:$sec \n";
    echo "<a target='blank' href='https://www.google.com/maps/dir/$url1/$url2'>Itineraire</a>";
    echo"<br>";
}

$url = "http://dev.virtualearth.net/REST/v1/Locations?q=$url1&key=Aqlp0E5DwZcIh_n7YvqLO3IK6AvgQ8MA3D2L-xRuFc66c9oLW2CmufisowR-KCQR";  

$content = @file_get_contents($url);

if ($content===false){
    echo "Erreur de latitude";
}else{
    $contentArray = json_decode($content, true);
    $lat1=$contentArray["resourceSets"][0]["resources"][0]["point"]["coordinates"][0];
    $lon1=$contentArray["resourceSets"][0]["resources"][0]["point"]["coordinates"][1];
    echo "Latitute 1 : $lat1";
    echo"<br>";
    echo "Longitude 1 : $lon1";
    echo"<br>";
}

$url = "http://dev.virtualearth.net/REST/v1/Locations?q=$url2&key=Aqlp0E5DwZcIh_n7YvqLO3IK6AvgQ8MA3D2L-xRuFc66c9oLW2CmufisowR-KCQR";  

$content = @file_get_contents($url);

if ($content===false){
    echo "Erreur de latitude";
}else{
    $contentArray = json_decode($content, true);
    $lat2=$contentArray["resourceSets"][0]["resources"][0]["point"]["coordinates"][0];
    $lon2=$contentArray["resourceSets"][0]["resources"][0]["point"]["coordinates"][1];
    echo "Latitute 2 : $lat2";
    echo"<br>";
    echo "Longitude 2 : $lon2";
    echo"<br>";
}


$dist=haversineGreatCircleDistance($lat1, $lon1, $lat2, $lon2);

echo "Distance : $dist";

  // function getListesProches(int $idBenevole) : array {
  //   $annonces = array();
  //   $sql="SELECT id_list,lists.id_user from lists,users where lists.id_user=users.id_user and etat='Postee' order by dateCreation desc";
  //   $req=$this->db->query($sql);
  //   $res=$req->fetch_all();
  //   for($i=0;$i<count($res);$i++){
  //     $id=intval($res[$i][0]);
  //     $idClient=intval($res[$i][1]);
  //     $user = $this->getuserById($idClient);
  //     $list = $this->getListById($id);
  //     $distance=$this->getDistance($idBenevole,$idClient);
  //     $annonces[] = new Annonce($user,$list,$distance);
  //   }
  //   return $annonces;
  // }
//   function getDistance(int $idBenevole,int $idClient) : float {

//     $client=$this->getUserById($idClient);
//     $benevole=$this->getUserById($idBenevole);

//     $latitudeFrom=$benevole->getLatitude();
//     $longitudeFrom=$benevole->getLongitude();
//     $latitudeTo=$client->getLatitude();
//     $longitudeTo=$client->getLongitude();

//     $latFrom = deg2rad($latitudeFrom);
//     $lonFrom = deg2rad($longitudeFrom);
//     $latTo = deg2rad($latitudeTo);
//     $lonTo = deg2rad($longitudeTo);
  
//     $latDelta = $latTo - $latFrom;
//     $lonDelta = $lonTo - $lonFrom;
  
//     $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) + cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
//     return $angle * 6371;
//   }

//   function getCoord(string $adresse) : array{

//     $adresseUrl=rawurlencode($adresse);
//     $api = "http://dev.virtualearth.net/REST/v1/Locations?q=$adresseUrl&key=Aqlp0E5DwZcIh_n7YvqLO3IK6AvgQ8MA3D2L-xRuFc66c9oLW2CmufisowR-KCQR";  
//     $content = @file_get_contents($url);

//     if ($content===false){
//       throw new Exception('Adresse non trouvée');
//     }else{
//       $json = json_decode($content, true);
//       return $json["resourceSets"][0]["resources"][0]["point"]["coordinates"];
//     }

//   }
// function verifyAdresse(){

//     adresse=document.getElementById("adresse").value;
//     url = "http://dev.virtualearth.net/REST/v1/Locations?q="+adresse+"&key=Aqlp0E5DwZcIh_n7YvqLO3IK6AvgQ8MA3D2L-xRuFc66c9oLW2CmufisowR-KCQR"; 

//     request = new XMLHttpRequest()
//     request.open('GET', url);

//     request.onreadystatechange=function(){
//         if (request.readyState==4){
//             if(JSON.parse(request.responseText).resourceSets[0].estimatedTotal!=0 && JSON.parse(request.responseText).resourceSets[0].resources[0].confidence=="High"){
//                 document.getElementById("adresse").setCustomValidity('');
//             }else{
//                 document.getElementById("adresse").setCustomValidity("Adresse inconnue");
//             }   
//         }

//     }

//     request.send();

// }

// function confirmerMDP(){
//     if (document.getElementById('password').value!=document.getElementById('confirmPassword').value){
//         document.getElementById('confirmPassword').setCustomValidity('Les 2 mots de passe sont différents');
//     }else{
//         document.getElementById('confirmPassword').setCustomValidity('');
//     }
// }

?>