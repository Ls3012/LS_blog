
<h1><?= $params['post']-> title ?></h1>
<p><?= $params['post']->content_Art?></p>

<h2>Commentaires</h2>
<?php foreach ($params['comments'] as $comment): ?>
    <div class="card mb-3">
        <p><?= $comment->content_Com ?></p>
        <small class="badge badge-secondary" style="background-color: burlywood">Par <?= $comment->nickname ?> le <?= $comment->getCreatedAtCom() ?></small>
    </div>
<?php endforeach ?>

<?php if (isset($_SESSION['auth']) && ($_SESSION['auth'] === 0 || $_SESSION['auth'] === 1)): ?>
    <h3>Ajouter un commentaire</h3>
    <form action="/ProjetsOC/LS_Blog/add-comment/<?= $params['post']->idArticle ?>" method="POST">
        <div class="form-group">
            <label for="comment">Votre commentaire</label>
            <textarea class="form-control" name="comment" id="comment" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter le commentaire</button>
    </form>
<?php endif ?>

<a href="/ProjetsOC/LS_Blog/posts" class="btn btn-secondary">Retourner aux articles</a>
