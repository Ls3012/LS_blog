
<h1><?= $params['post']-> title ?></h1>
<p><?= $params['post']->content_Art?></p>

<h2>Commentaires</h2>
<?php foreach ($params['comments'] as $comment): ?>
    <div class="card mb-3">
        <p><?= $comment->content_Com ?></p>
        <small class="badge badge-secondary" style="background-color: burlywood">Par <?= $comment->nickname ?> le <?= $comment->getCreatedAtCom() ?></small>
    </div>
<?php endforeach ?>

<a href="/ProjetsOC/LS_Blog/posts" class="btn btn-secondary">Retourner aux articles</a>
