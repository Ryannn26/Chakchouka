<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <!-- Logo / Nom de la plateforme -->
    <a class="navbar-brand" href="#" style="font-size: 1.8rem; font-weight: bold;">chakchouka</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Contenu de la barre de navigation -->
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <!-- Accueil -->
        <li class="nav-item">
          <a class="nav-link" href="index.php">Accueil</a>
        </li>
        <!-- Marketplace -->
        <li class="nav-item">
          <a class="nav-link" href="marketplace.php">Marketplace</a>
        </li>
        <!-- Forum avec sous-menu -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="forumDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Forum
          </a>
          <ul class="dropdown-menu" aria-labelledby="forumDropdown">
            <li><a class="dropdown-item" href="index.php">Question</a></li>
            <li><a class="dropdown-item" href="publish-question.php">Publier une question</a></li>
            <li><a class="dropdown-item" href="my-questions.php">Mes questions</a></li>
          </ul>
        </li>
        <!-- Déconnexion -->
        <?php if (isset($_SESSION['auth'])) { ?>
        <li class="nav-item">
          <a class="nav-link btn btn-danger text-white px-3" href="action/user/logoutAction.php">Déconnexion</a>
        </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>
