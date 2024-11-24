<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Chakchoka</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link e"  href="indexAdmin.php">Question</a>
        </li>
        <?php
        if (isset($_SESSION['auth'])){?>
          <li class="nav-item">
          <a class="nav-link" href="action/user/logoutAction.php">Déconnexion</a>
        </li>
        
        <?php
        }
        ?>
      </ul>
    </div>
  </div>
</nav>