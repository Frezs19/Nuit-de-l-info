<!DOCTYPE html>
<html lang="en">

<head>
  <title>Shome - Consulter les listes</title>
  <link rel="icon" href="../view/img/logo.png" />
  <link rel="shortcut icon" href="../view/img/logo.png" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="../view/css/consulterListes.css">
  <link rel="stylesheet" href="../view/fonts/fonts.css">
  <link href="../view/css/hamburgers-master/dist/hamburgers.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="../view/js/main.js"></script>
</head>

<body>

  <nav class="navbar navbar-expand-md justify-content-right" id="menu">
    <!-- Brand -->
    <a class="navbar-brand" href="../view/mainpage.view.php">
      <img src="../view/img/logo.png" class="logo-sm">
    </a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler hamburger hamburger--spin" type="button" data-toggle="collapse"
      data-target="#collapsibleNavbar" onClick="hamburgerClick();" id="hamburger">
      <span class="navbar-toggler-icon hamburger-box">
        <span class="hamburger-inner"></span>
      </span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <span class="navbar-text mr-auto" id="navbarTitre">
        Shome
      </span>
      <ul class="navbar-nav">
        <?php if (isset($_SESSION['id'])): ?>
          <li class="nav-item">
          <a class="nav-link" href="../controler/mesListes.ctrl.php" id="boutonListes">Mes listes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../controler/profil.ctrl.php"><?php echo $_SESSION["prenom"].' '.$_SESSION["nom"]?></a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="../controler/deconnexion.ctrl.php">Deconnexion</a>
          </li>
        <?php else: ?>
          <li class="nav-item">
          <a class="nav-link" href="" id="boutonListes">Mes listes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" onclick="openConnexionWindow();" id="boutonConnexion">Connexion</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="inscription.view.php" id="boutonInscription">Inscription</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </nav>

  <div id="titre">
    <h1>Les listes à proximité</h1>
  </div>

  <div id="listeContainer">

    <?php foreach($listesProches as $annonce): ?>
    <div class="liste">
      <div class="info">
        <div>
          <img src="../view/img/placeholder.png"><h3><?=$annonce->getClient()->getCodePostal()?></h3>
          <br> <?=$annonce->getClient()->getAdresse()?>
          <br> <a target="blank"href="https://www.google.com/maps/dir/<?=$currentUser->getAdresse().'/'.$annonce->getClient()->getAdresse()?>">Itineraire</a>
        </div>
        <p>Posté <strong class="hl"><?=utf8_encode(strftime("%A %e %B %R",strtotime($annonce->getListe()->getDateCreation())));?></strong></p>
      </div>
      <h2><?=$annonce->getClient()->getNomPrenom()." ".$annonce->getClient()->getTel()?></h2>
      <h2>Prix maximum total : <?=$annonce->getListe()->getPrixTotal()."€"?></h2>
      <img src="../view/img/liste.png" class="logo-sm listIcon">
      <div class="produits">
        <?php foreach($annonce->getListe()->getListProduits() as $product): ?>
          <p><?=$product->getNom()." ";?><i><?=$product->getMarque()." ";?></i><?php if($product->getQuantite()!="") echo "x".$product->getQuantite()." ";?><strong><?=$product->getPrixMax()."€ max ";?></strong></p>
          <?php if($product->getNomSubstitut()!=""):?>
            <img src="../view/img/shuffle.png"><p class="substituant"><?=$product->getNomSubstitut()." ";?><i><?=$product->getMarqueSubstitut()." ";?></i><?php if($product->getQuantiteSubstitut()!="") echo "x".$product->getQuantiteSubstitut()." ";?><strong><?=$product->getPrixMaxSubstitut()."€ max ";?></strong></p>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
      <div class="ajouterProduit" onclick="window.location.replace('../controler/gestionListes.ctrl.php?action=accepterListe&idListe=<?=$annonce->getListe()->getIdList();?>')";>
        <img src="../view/img/logo.png" class="logo-sm">
        <p>Je veux livrer cette liste</p>
      </div>
    </div>
    <?php endforeach; ?>


  </div>
  <footer>
    <a href=""><img src="../view/img/logo_blanc.png" class="logo-sm"></a>
    <a href="mailto:projet.M3301@outlook.fr?subject=A%20propos%20de%20Shome">Nous contacter</a>
    <a href="../view/credit.view.php">Crédits Illustrations</a>
    <a href="../view/charte.view.php">Charte d'utilisation</a>
    <a href="../view/CGU.view.php">CGU</a>
</footer>

</body>

</html>
