<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Shome - CGU</title>
  <link rel="icon" href="img/logo.png" />
  <link rel="shortcut icon" href="img/logo.png" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/CGU.css">
  <link rel="stylesheet" href="fonts/fonts.css">
  <link href="css/hamburgers-master/dist/hamburgers.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</head>

<body>

  <nav class="navbar navbar-expand-md justify-content-right" id="menu">
    <!-- Brand -->
    <a class="navbar-brand" href="mainpage.view.php">
      <img src="img/logo.png" class="logo-sm">
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

  <!-- Fenetre de connexion-->
  <div id="connexionWindow" style="height: 0em;">
    <form action="../controler/connexion.ctrl.php" method="post">
      <div>
        <label for="email" class="idLabel">Identifiant</label><br>
        <input type="text" id="email" name="email" placeholder="Email" class="identifiants">
      </div>

      <div>
        <label for="password" class="idLabel">Mot de passe</label><br>
        <input type="password" id="password" name="password" placeholder="Mot de passe" class="identifiants">
      </div>

      <input type="submit" value="Se connecter" id="connectButton">
      <a href=""><span>Mot de passe oubli?? ?</span></a>
    </form>
  </div>


<div class="CGU">
  <h1><b>Conditions g??n??rales d'utilisation du site Shome</b></h1>
  <section class="preambule">
    <h3><b>Pr??ambule</b></h3>
    <p>Les pr??sentes conditions g??n??rales d'utilisation sont conclues entre :<br>
        &nbsp;&nbsp;&nbsp;- le g??rant du site internet, ci-apr??s d??sign?? ?? l?????diteur ??,<br>
        &nbsp;&nbsp;&nbsp;- toute personne souhaitant acc??der au site et ?? ses services, ci-apr??s appel?? ?? l???Utilisateur ??.</p>
  </section>

  <section class="article 1">
      <h3><b>Article 1 - Principes </b></h3>
        <p>Les pr??sentes conditions g??n??rales d'utilisation ont pour objet l'encadrement juridique de l???utilisation du site Shome et de ses services.<br>
          Le site Internet shome est un service : </p>
        <ul>
            <li>d'aide ?? la personne</li>
            <li>situ??e ?? Grenoble, France</li>
            <li>adresse URL du site : 2.7.7.134/</li>
            <li>Email : projet.M3301@outlook.fr</li>
        </ul>
        <p>Les conditions g??n??rales d'utilisation doivent ??tre accept??es par l'Utilisateur lors de son inscription.</p>
  </section>

  <section class="article 2">
        <h3><b>Article 2 - Evolution et dur??e des CGU</b></h3>
        <p>Les pr??sentes conditions g??n??rales d'utilisation sont conclues pour une dur??e ind??termin??e. Le contrat produit ses effets ?? l'??gard de l'Utilisateur ?? compter du d??but de l???utilisation du service.<br>
          Le site Shome se r??serve le droit de modifier les clauses de ces conditions g??n??rales d???utilisation ?? tout moment et sans justification.</p>
  </section>

  <section class="article 3">
        <h3><b>Article 3 - Acc??s au site</b></h3>
        <p>Tout Utilisateur ayant acc??s ?? internet peut acc??der gratuitement et depuis n???importe o?? au site Shome. Les frais support??s par l???Utilisateur pour y acc??der (connexion internet, mat??riel informatique, etc.) ne sont pas ?? la charge de l?????diteur.<br>
        Le site et ses diff??rents services peuvent ??tre interrompus ou suspendus par l?????diteur, notamment ?? l???occasion d???une maintenance, sans obligation de pr??avis ou de justification.</p>
  </section>

  <section class="article 4">
        <h3><b>Article 4  - Responsabilit??s </b></h3>
        <p>La responsabilit?? de l'??diteur ne peut ??tre engag??e en cas de d??faillance, panne, difficult?? ou interruption de fonctionnement, emp??chant l'acc??s au site ou ?? une de ses fonctionnalit??s.<br>
        Le mat??riel de connexion au site utilis??e est sous l'enti??re responsabilit?? de l'Utilisateur qui doit prendre toutes les mesures appropri??es pour prot??ger le mat??riel et les donn??es notamment d'attaques virales par Internet. L'utilisateur est par ailleurs le seul responsable des sites et donn??es qu'il consulte.</p>

        <p>L'??diteur n'est pas responsable des dommages caus??s ?? l'Utilisateur, ?? des tiers et/ou ?? l'??quipement de l'Utilisateur du fait de sa connexion ou de son utilisation du site et l'Utilisateur renonce ?? toute action contre l'??diteur de ce fait.<br>
        Si l'??diteur venait ?? faire l'objet d'une proc??dure amiable ou judiciaire ?? raison de  l'utilisation du site par l'Utilisateur, il pourra retourner contre lui pour obtenir indemnisation de tous les pr??judices, sommes, condamnations et frais qui pourraient d??couler de cette proc??dure.</p>

  </section>

  <section class="article 5">
        <h3><b>Article 5  - Propri??t?? intellectuelle</b></h3>
        <p>Tous les documents techniques, produits, photographies, textes, logos, dessins, vid??os, etc., sont soumis ?? des droits d'auteur et sont prot??g??s par le Code de la propri??t?? intellectuelle. Lorsqu'ils sont remis ?? nos clients, ils demeurent la propri??t?? exclusive de Shome, seul titulaire des droits de propri??t?? intellectuelle sur ces documents, qui doivent lui ??tre rendus ?? sa demande.<br>
        Nos clients s'engagent ?? ne faire aucun usage de ces documents, susceptible de porter atteinte aux droits de propri??t?? industrielle ou intellectuelle du fournisseur et s'engagent ?? ne les divulguer ?? aucun tiers, en dehors d'une autorisation expresse et pr??alable donn??e par l'Editeur.</p>
  </section>

  <section class="article 6">
        <h3><b>Article 6  - Liens hypertextes</b></h3>
        <p>La mise en place par l'Utilisateur de tous liens hypertextes vers tout ou partie du site est strictement interdite.</p>
  </section>

  <section class="article 7">
        <h3><b>Article 7 - Protection des donn??es personnelles</b></h3>
        <article class="Donn??es collect??es">
          <h4>Donn??es collect??es </h4>
          <p>Les donn??es ?? caract??re personnel qui sont collect??es sur ce site sont les suivantes :<br>
              &nbsp;&nbsp;&nbsp;-<b>ouverture du compte :</b> lors de la cr??ation du compte de l'utilisateur : nom; prenom; adresse mail; numero de telephone; adresse g??ographique; code postal;<br>
              &nbsp;&nbsp;&nbsp;-<b>connexion :</b> lors de la connexion de l'utilisateur au site web, celui-ci enregistre, notamment, son adresse mail ainsi que son mot de passe.<br>
              &nbsp;&nbsp;&nbsp;-<b>profil :</b> l'utilisation des prestations pr??vues sur le site web permet de renseigner un profil, pouvant comprendre une adresse et un num??ro de t??l??phone ;<br>
              &nbsp;&nbsp;&nbsp;-<b>cookies :</b>  les cookies sont utilis??s, dans le cadre de l'utilisation du site. L'utilisateur a la possibilit?? de d??sactiver les cookies ?? partir des param??tres de son navigateur.</p>
        </article>

        <article class="Utilisation des donn??es personnelles ">
          <h4>Utilisation des donn??es personnelles </h4>
          <p>Les donn??es personnelles collect??es aupr??s des utilisateurs ont pour objectif la mise ?? disposition des services du site web, leur am??lioration et le maintien d'un environnement s??curis??. Plus pr??cis??ment, les utilisations sont les suivantes :<br>
              &nbsp;&nbsp;&nbsp;- acc??s et utilisation du site web par l'utilisateur;<br>
              &nbsp;&nbsp;&nbsp;- gestion du fonctionnement et optimisation du site web;<br>
              &nbsp;&nbsp;&nbsp;- proposition ?? l'utilisateur de la possibilit?? de communiquer avec d'autres utilisateurs du site web ;
          </p>
        </article>

        <article class="S??curit?? et confidentialit??">
          <h4>S??curit?? et confidentialit?? </h4>
          <p>Le site web met en oeuvre des mesures organisationnelles, techniques, logicielles et physiques en mati??re de s??curit?? du num??rique pour prot??ger les donn??es personnelles contre les alt??rations,
            destructions et acc??s non autoris??s. Toutefois, il est ?? signaler qu'internet n'est pas un environnement compl??tement s??curis?? et le site web ne peut pas garantir la s??curit?? de la transmission ou du stockage des informations sur internet.</p>
        </article>

        <article class="Mise en oeuvre des droits des utilisateurs">
          <h4>Mise en oeuvre des droits des utilisateurs</h4>
          <p>En application de la r??glementation applicable aux donn??es ?? caract??re personnel, les utilisateurs disposent des droits suivants : </p>
          <ul>
              <li>le droit d???acc??s : ils peuvent exercer leur droit d'acc??s, pour conna??tre les donn??es personnelles les concernant. Dans ce cas, avant la mise en ??uvre de ce droit, le site web peut demander une preuve de l'identit?? de l'utilisateur afin d'en v??rifier l'exactitude. </li>
              <li>le droit de rectification : si les donn??es ?? caract??re personnel d??tenues par le site web sont inexactes, ils peuvent demander la mise ?? jour des informations.</li>
              <li>le droit de suppression des donn??es : les utilisateurs peuvent demander la suppression de leurs donn??es ?? caract??re personnel, conform??ment aux lois applicables en mati??re de protection des donn??es. </li>
              <li>le droit de s???opposer au traitement des donn??es : les utilisateurs peuvent s???opposer ?? ce que ses donn??es soient trait??es conform??ment aux hypoth??ses pr??vues par le RGPD.  </li>
              <li>le droit ?? la portabilit?? : ils peuvent r??clamer que le site web leur remette les donn??es personnelles qui lui sont fournies pour les transmettre ?? un nouveau site web.</li>
          </ul>
        </article>
  </section>

  <section class="article 8">
    <h3>Article 8  - Cookies</h3>
    <p>Le site Shome peut collecter automatiquement des informations standards. Toutes les informations collect??es indirectement ne seront utilis??es que pour suivre le volume, le type et la configuration du trafic utilisant ce site, pour en d??velopper la conception et l'agencement et ?? d'autres fins administratives et de planification et plus g??n??ralement pour am??liorer le service que nous vous offrons.</p>
  </section>

</div>


  <section class='charte-client'>

  </section>

</section>

<footer>
    <a href=""><img src="../view/img/logo_blanc.png" class="logo-sm"></a>
    <a href="mailto:projet.M3301@outlook.fr?subject=A%20propos%20de%20Shome">Nous contacter</a>
    <a href="../view/credit.view.php">Cr??dits Illustrations</a>
    <a href="../view/charte.view.php">Charte d'utilisation</a>
    <a href="../view/CGU.view.php">CGU</a>
</footer>

</body>

</html>
