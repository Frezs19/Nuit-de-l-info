<!DOCTYPE html>
<html lang="en">

<head>
  <title>Shome - Mes listes</title>
  <link rel="icon" href="../view/img/logo.png" />
  <link rel="shortcut icon" href="../view/img/logo.png" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="../view/css/meslistes.css">
  <link rel="stylesheet" href="../view/fonts/fonts.css">
  <link href="../view/css/hamburgers-master/dist/hamburgers.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="../view/js/main.js"></script>
  <script src="../view/js/meslistes.js"></script>
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
            <a class="nav-link" href="inscription.view.php" id="boutonInscription">Inscription</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </nav>
  
  <div id="titre">
    <h1>Mes listes</h1>
  </div>

    <div id="listeContainer" >

    <?php if($client): ?>

      <div class="section favoris" onclick="afficherListes('Favoris');">
        <span class="tooltiptext favoris"><img src="../view/img/speech-bubble.png" class="logo-sm"><br>Cliquez pour voir vos listes favorites. Vous pouvez les reposter ou les enlever des listes favorites</span>
        <h1>Favorites</h1>
        <h2>(<?=count($listesFavorites)?>)</h2>
      </div>

      <!-- Listes Favoris -->

      <?php foreach($listesFavorites as $annonce): ?>

        <div class="liste listeFavoris">
          <div class="info">
            <div>
              <img src="../view/img/placeholder.png"><h3><?=$annonce->getClient()->getCodePostal()?></h3>
              <br><?=$annonce->getClient()->getAdresse()?>
            </div>
            <p>Etat <strong class="hl"><?=$annonce->getListe()->getEtat()?></strong></p>
          </div>
          <div class="info">
          <h2><?=$annonce->getClient()->getNomPrenom()." ".$annonce->getClient()->getTel()?></h2>
          <?php if ($annonce->getListe()->getFavoris()==1):?>
          <img class="logo-sm" src="../view/img/star.png" alt="">
          <?php endif; ?>
          </div>
          <div class="info">
          <h2>Prix maximum total : <?=$annonce->getListe()->getPrixTotal()."€"?></h2>
          <h2>n° : <?=$annonce->getListe()->getIdList()?></h2>
          </div>
          <img src="../view/img/liste.png" class="logo-sm listIcon">
          <div class="produits">
            <?php foreach($annonce->getListe()->getlistProduits() as $product): ?>
              <p><?=$product->getNom()." ";?><i><?=$product->getMarque()." ";?></i><?php if($product->getQuantite()!="") echo "x".$product->getQuantite()." ";?><strong><?=$product->getPrixMax()."€ max ";?></strong></p>
              <?php if($product->getNomSubstitut()!=""):?>
                <img src="../view/img/shuffle.png"><p class="substituant"><?=$product->getNomSubstitut()." ";?><i><?=$product->getMarqueSubstitut()." ";?></i><?php if($product->getQuantiteSubstitut()!="") echo "x".$product->getQuantiteSubstitut()." ";?><strong><?=$product->getPrixMaxSubstitut()."€ max ";?></strong></p>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
      
          <div class="boutonListe" onclick="window.location.replace('../controler/reposterListe.ctrl.php?idListe=<?=$annonce->getListe()->getIdList();?>')";>
            <img src="../view/img/shuffle.png" class="logo-sm">
            <p>Reposter cette liste</p>
          </div>

          <div class="boutonListe" onclick="window.location.replace('../controler/gestionListes.ctrl.php?action=supprimerFavoris&idListe=<?=$annonce->getListe()->getIdList();?>')";>
            <img src="../view/img/bin.png" class="logo-sm">
            <p>Supprimer des favoris</p>
          </div>
        </div>

      <?php endforeach; ?>

      <div class="section disponible" onclick="afficherListes('Disponible');">
          <span class="tooltiptext disponible"><img src="../view/img/speech-bubble.png" class="logo-sm"><br>Cliquez pour voir les listes que vous avez postées mais qui n'ont pas encore été acceptées par un bénévole. Vous pouvez les modifier ou les supprimer</span>
        <h1>Postées</h1>
        <h2>(<?=count($listesPostees)?>)</h2>
      </div>

      <!-- Listes postées -->

      <?php foreach($listesPostees as $annonce): ?>

        <div class="liste listeDisponible">
          <div class="info">
            <div>
              <img src="../view/img/placeholder.png"><h3><?=$annonce->getClient()->getCodePostal()?></h3>
              <br><?=$annonce->getClient()->getAdresse()?>
            </div>
            <p>Etat <strong class="hl"><?=$annonce->getListe()->getEtat()?></strong></p>
          </div>
          <div class="info">
          <h2><?=$annonce->getClient()->getNomPrenom()." ".$annonce->getClient()->getTel()?></h2>
          <?php if ($annonce->getListe()->getFavoris()==1):?>
          <img class="logo-sm" src="../view/img/star.png" alt="">
          <?php endif; ?>
          </div>
          <div class="info">
          <h2>Prix maximum total : <?=$annonce->getListe()->getPrixTotal()."€"?></h2>
          <h2>n° : <?=$annonce->getListe()->getIdList()?></h2>
          </div>
          <img src="../view/img/liste.png" class="logo-sm listIcon">
          <div class="produits">
            <?php foreach($annonce->getListe()->getlistProduits() as $product): ?>
              <p><?=$product->getNom()." ";?><i><?=$product->getMarque()." ";?></i><?php if($product->getQuantite()!="") echo "x".$product->getQuantite()." ";?><strong><?=$product->getPrixMax()."€ max ";?></strong></p>
              <?php if($product->getNomSubstitut()!=""):?>
                <img src="../view/img/shuffle.png"><p class="substituant"><?=$product->getNomSubstitut()." ";?><i><?=$product->getMarqueSubstitut()." ";?></i><?php if($product->getQuantiteSubstitut()!="") echo "x".$product->getQuantiteSubstitut()." ";?><strong><?=$product->getPrixMaxSubstitut()."€ max ";?></strong></p>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
    
        <div class="boutonListe" onclick="window.location.replace('../controler/modifierListe.ctrl.php?idListe=<?=$annonce->getListe()->getIdList();?>')";>
          <img src="../view/img/liste.png" class="logo-sm">
          <p>Modifier cette liste</p>
        </div>
        <div class="boutonListe" onclick="window.location.replace('../controler/gestionListes.ctrl.php?action=supprimerListe&idListe=<?=$annonce->getListe()->getIdList();?>')";>
          <img src="../view/img/wrong.png" class="logo-sm">
          <p>Supprimer cette liste</p>
        </div>
      </div>
      <?php endforeach; ?>

    <?php endif; ?>

      <!-- Bouton Liste Terminees -->
      <div class="section encours" onclick="afficherListes('Encours');">
        <?php if($client): ?>
          <span class="tooltiptext encours"><img src="../view/img/speech-bubble.png" class="logo-sm"><br>Cliquez pour voir les listes qui ont été acceptées par un bénévole. Vous pouvez voir son profil et confirmer la livraison une fois qu'il vous a livré vos courses</span>
        <?php else: ?>
          <span class="tooltiptext encours"><img src="../view/img/speech-bubble.png" class="logo-sm"><br>Cliquez pour voir les listes que vous avez accepté de livrer. Vous pouvez annulez la livraison ou la confirmer une fois que vous avez livré le client</span>
        <?php endif; ?>       
        <h1>En cours</h1>
        <h2>(<?=count($listesEnCours)?>)</h2>
      </div>

      <!-- Listes en cours -->
      <?php foreach($listesEnCours as $annonce): ?>


        <div class="liste listeEncours">
          <div class="info">
            <div>
              <img src="../view/img/placeholder.png"><h3><?=$annonce->getClient()->getCodePostal()?></h3>
              <br><?=$annonce->getClient()->getAdresse()?>
              <?php if (!$client):?>
                <br> <a target="blank"href="https://www.google.com/maps/dir/<?=$currentUser->getAdresse().'/'.$annonce->getClient()->getAdresse()?>">Itineraire</a>
              <?php endif; ?>
            </div>
            <p>Etat <strong class="hl"><?=$annonce->getListe()->getEtat()?></strong></p>
          </div>
          <div class="info">
          <h2><?=$annonce->getClient()->getNomPrenom()." ".$annonce->getClient()->getTel()?></h2>
          <?php if ($annonce->getListe()->getFavoris()==1):?>
          <img class="logo-sm" src="../view/img/star.png" alt="">
          <?php endif; ?>
          </div>
          <div class="info">
          <h2>Prix maximum total : <?=$annonce->getListe()->getPrixTotal()."€"?></h2>
          <h2>n° : <?=$annonce->getListe()->getIdList()?></h2>
          </div>
          <img src="../view/img/liste.png" class="logo-sm listIcon">
          <div class="produits">
            <?php foreach($annonce->getListe()->getlistProduits() as $product): ?>
              <p><?=$product->getNom()." ";?><i><?=$product->getMarque()." ";?></i><?php if($product->getQuantite()!="") echo "x".$product->getQuantite()." ";?><strong><?=$product->getPrixMax()."€ max ";?></strong></p>
              <?php if($product->getNomSubstitut()!=""):?>
                <img src="../view/img/shuffle.png"><p class="substituant"><?=$product->getNomSubstitut()." ";?><i><?=$product->getMarqueSubstitut()." ";?></i><?php if($product->getQuantiteSubstitut()!="") echo "x".$product->getQuantiteSubstitut()." ";?><strong><?=$product->getPrixMaxSubstitut()."€ max ";?></strong></p>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
        <?php if($client): ?>
          <div class="boutonListe" onclick="window.location.replace('../controler/voirProfil.ctrl.php?idBenevole=<?=$annonce->getListe()->getIdBenevole();?>')";>
            <img src="../view/img/user.png" class="logo-sm">
            <p>Voir le profil du bénévole</p>
          </div>
        <?php endif; ?>
        <?php if(!$client): ?>
          <div class="boutonListe" onclick="window.location.replace('../controler/gestionListes.ctrl.php?action=annulerListe&idListe=<?=$annonce->getListe()->getIdList();?>')";>
            <img src="../view/img/wrong.png" class="logo-sm">
            <p>Annuler la livraison</p>
          </div>
        <?php endif; ?>
          <div class="boutonListe" onclick="window.location.replace('../controler/gestionListes.ctrl.php?action=confirmerLivraison&idListe=<?=$annonce->getListe()->getIdList();?>')";>
            <img src="../view/img/logo.png" class="logo-sm">
            <p>Confirmer la livraision</p>
          </div>
        </div>
      <?php endforeach; ?>




      <!-- Bouton Liste Terminees -->
      <div class="section termine" onclick="afficherListes('Termine');">
        <?php if($client): ?>
          <span class="tooltiptext termine"><img src="../view/img/speech-bubble.png" class="logo-sm"><br>Cliquez pour voir les listes dont la livraison a déja été effectué. Vous pouvez les reposter ou les ajouter à vos listes favorites</span>
        <?php else: ?>
          <span class="tooltiptext termine"><img src="../view/img/speech-bubble.png" class="logo-sm"><br>Cliquez pour voir les listes dont la livraison a déja été effectué.</span>
        <?php endif; ?>     
        
        <h1>Terminées</h1>
        <h2>(<?=count($listesTerminees)?>)</h2>
      </div>

      <!-- Listes Terminees -->
      <?php foreach($listesTerminees as $annonce): ?>


        <div class="liste listeTermine">
          <div class="info">
            <div>
              <img src="../view/img/placeholder.png"><h3><?=$annonce->getClient()->getCodePostal()?></h3>
              <br><?=$annonce->getClient()->getAdresse()?>
            </div>
            <p>Etat <strong class="hl"><?=$annonce->getListe()->getEtat()?></strong></p>
          </div>
          <div class="info">
          <h2><?=$annonce->getClient()->getNomPrenom()." ".$annonce->getClient()->getTel()?></h2>
          <?php if ($annonce->getListe()->getFavoris()==1):?>
          <img class="logo-sm" src="../view/img/star.png" alt="">
          <?php endif; ?>
          </div>
          <div class="info">
          <h2>Prix maximum total : <?=$annonce->getListe()->getPrixTotal()."€"?></h2>
          <h2>n° : <?=$annonce->getListe()->getIdList()?></h2>
          </div>
          <img src="../view/img/liste.png" class="logo-sm listIcon">
          <div class="produits">
            <?php foreach($annonce->getListe()->getlistProduits() as $product): ?>
              <p><?=$product->getNom()." ";?><i><?=$product->getMarque()." ";?></i><?php if($product->getQuantite()!="") echo "x".$product->getQuantite()." ";?><strong><?=$product->getPrixMax()."€ max ";?></strong></p>
              <?php if($product->getNomSubstitut()!=""):?>
                <img src="../view/img/shuffle.png"><p class="substituant"><?=$product->getNomSubstitut()." ";?><i><?=$product->getMarqueSubstitut()." ";?></i><?php if($product->getQuantiteSubstitut()!="") echo "x".$product->getQuantiteSubstitut()." ";?><strong><?=$product->getPrixMaxSubstitut()."€ max ";?></strong></p>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
      
          <?php if($client): ?>
            <div class="boutonListe" onclick="window.location.replace('../controler/reposterListe.ctrl.php?idListe=<?=$annonce->getListe()->getIdList();?>')";>
              <img src="../view/img/shuffle.png" class="logo-sm">
              <p>Reposter cette liste</p>
            </div>
          
            <div class="boutonListe" onclick="window.location.replace('../controler/gestionListes.ctrl.php?action=ajouterFavoris&idListe=<?=$annonce->getListe()->getIdList();?>')";>
              <img src="../view/img/add-button.png" class="logo-sm">
              <p>Ajouter aux favoris</p>
            </div>
          <?php endif; ?>
        </div>

      <?php endforeach; ?>   

      <?php if($client): ?>
        <div class="section nouvelle" onclick="window.location.replace('../view/posterListe.view.php')";>
          <h1>Poster une nouvelle liste</h1>
        </div>
      <?php else: ?>
        <div class="section nouvelle" onclick="window.location.replace('../controler/consulterListes.ctrl.php')";>
          <h1>Accepter une nouvelle liste</h1>
        </div>
      <?php endif; ?>

    </div>

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