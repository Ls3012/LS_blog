<h1><?= $params['post']-> title ?? 'Creer un nouvel article' ?></h1>

<form action="<?= isset($params['post']) ? "/ProjetsOC/LS_Blog/admin/posts/edit/{$params['post']->idArticle}" : "/ProjetsOC/LS_Blog/admin/posts/create/" ?>" method="POST">


    <div class="form-group">
        <label for="title">Titre de l'article</label>
        <input type="text" class="form-control" name="title" id="title" value="<?= $params['post']->title ?? '' ?>">
    </div>
    <div class="form-group">
        <label for="content_Art">Contenu de l'article</label>
        <textarea name="content_Art" id="content_Art" rows="8" class="form-control"><?= $params['post']->content_Art ?? '' ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary"><?= isset($params['post']) ?'Enregistrer les modifications' : 'Creer mon article' ?></button>

</form>