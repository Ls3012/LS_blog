<h1> Les derniers articles </h1>

<?php foreach ($params['posts'] as $post): ?>

    <div class="card mb-3">
        <div class="card-body">
            <h2>
                <?= $post->title ?> 
            </h2>
            <small>
                <?= $post->creationDate_Art?>
            </small>
            <p>
                <?= $post->content_Art ?>
            </p>
            <a href="/ProjetsOC/LS_Blog/posts/<?= $post->idArticle?>" class="btn btn-primary">Voir article</a>
        </div>
    </div>

<?php endforeach ?>