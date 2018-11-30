<?php if(!isset($_SESSION['user'])){ ?>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
      <a class="navbar-brand" href="#">JeuKdo</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="?p=home">Accueil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?p=login">Connexion</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?p=register">Inscription</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
      </li>
    </ul>
  </div>
  </div>
</nav>
<?php } else { ?>
 <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
      <a class="navbar-brand" href="#">JeuKdo</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="?p=home">Les Serveurs</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="?p=index">Recharger</a>
      </li>
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        <?php echo $_SESSION['user']['nom'].' '.$_SESSION['user']['prenom']; ?>
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Solde: <?php echo $_SESSION['user']['solde'].' euros'; ?></a>
        <a class="dropdown-item" href="?p=recharge">Recharger votre compte</a>
        <a class="dropdown-item" href="?p=demande">Demande de paiement</a>
        <a class="dropdown-item" href="?p=historique">Historiques de paiements</a>
        <a class="dropdown-item" href="?p=cmdtrait">Historiques de commande</a>
        <a class="dropdown-item" href="?p=parametres">Paramètres</a>
        <a class="dropdown-item" href="?p=logout">Dèconnexion</a>
      </div>
    </li>

    </ul>
  </div>
  </div>
</nav>
<?php }  ?>