<h1>Modifier <?= $params['post']-> title ?></h1>

<form action="/ProjetsOC/LS_Blog/admin/posts/edit/<?= $params['post']->idArticle ?>" method="POST">

    <div class="form-group">
        <label for="title">Titre de l'article</label>
        <input type="text" class="form-control" name="title" id="title" value="<?= $params['post']->title ?>">
    </div>
    <div class="form-group">
        <label for="content_Art">Contenu de l'article</label>
        <textarea name="content_Art" id="content_Art" rows="8" class="form-control"><?= $params['post']->content_Art ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Enregistre les modifs</button>

</form>