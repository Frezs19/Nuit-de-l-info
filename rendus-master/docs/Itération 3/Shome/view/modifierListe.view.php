<!DOCTYPE html>
<html lang="en">

<head>
  <title>Shome - Modifier ma liste</title>
  <link rel="icon" href="../view/img/logo.png" />
  <link rel="shortcut icon" href="../view/img/logo.png" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="../view/css/posterListe.css">
  <link rel="stylesheet" href="../view/fonts/fonts.css">
  <link href="../view/css/hamburgers-master/dist/hamburgers.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="../view/js/posterListe.js"></script>
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
            <a class="nav-link" onclick="openConnexionWindow();" id="boutonConnexion">Connexion</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../view/inscription.view.php" id="boutonInscription">Inscription</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </nav>

  <div>
    <div id="titre">
      <img src="../view/img/liste.png" id="liste">
      <h1>Modifier ma liste</h1>
    </div>
  </div>

  <form action="../controler/gestionListes.ctrl.php?action=modifierListe&idListe=<?=$liste->getIdList()?>" method="post">
    <div id="listeProduit">

            <?php foreach($liste->getListProduits() as $produit):?>
              <script type="text/javascript">ajouterProduitRemplit("<?=$produit->getNom()?>","<?=$produit->getMarque()?>","<?=$produit->getPrixMax()?>","<?=$produit->getQuantite()?>","<?=$produit->getNomSubstitut()?>","<?=$produit->getMarqueSubstitut()?>","<?=$produit->getPrixMaxsubstitut()?>","<?=$produit->getQuantiteSubstitut()?>");</script>
            <?php endforeach; ?>

    </div>

    <div class="ajouterProduit" onclick="ajouterProduit();">
      <img src="../view/img/add-button.png" class="logo-sm">
      <p>Ajouter un produit</p>
    </div>

    <input type="submit" value="Modifier ma liste de course" id="boutonPoster">
  </form>

  <footer>
    <a href=""><img src="../view/img/logo_blanc.png" class="logo-sm"></a>
    <a href="mailto:projet.M3301@outlook.fr?subject=A%20propos%20de%20Shome">Nous contacter</a>
    <a href="../view/credit.view.php">Crédits Illustrations</a>
    <a href="../view/charte.view.php">Charte d'utilisation</a>
    <a href="../view/CGU.view.php">CGU</a>
</footer>

</body>

</html>