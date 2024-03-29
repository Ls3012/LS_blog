<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LS_Blog</title>
    <link rel="stylesheet" href="<?= SCRIPTS . 'css' . DIRECTORY_SEPARATOR . 'app.css' ?>">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/ProjetsOC/LS_Blog/">Blog</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="/ProjetsOC/LS_Blog/">Accueil </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/ProjetsOC/LS_Blog/posts">Articles</a>
      </li>
    </ul>
    <ul class="navbar-nav">

    <?php if (isset($_SESSION['auth']) && ($_SESSION['auth'] === 0 || $_SESSION['auth'] === 1)): ?>

      <li class="nav-item ml-auto">
        <a class="nav-link" href="/ProjetsOC/LS_Blog/logout">Se deconnecter </a>
      </li>
      <?php else: ?>
      <li class="nav-item ml-auto">
        <a class="nav-link" href="/ProjetsOC/LS_Blog/login">Se connecter </a>
      </li>

      <?php endif ?>

    </ul>
  </div>
</nav>

<nav class="navbar fixed-bottom bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Fixed bottom</a>

    <?php if(isset($_SESSION['auth']) && $_SESSION['auth']): ?>
            <!-- Afficher le bouton d'administration uniquement pour l'admin -->
            <a class="btn btn-primary" href="/ProjetsOC/LS_Blog/admin">Administration</a>
    <?php endif; ?>

  </div>
</nav>

    <div class="container">
        <?= $content ?>
    </div>
</body>
</html>