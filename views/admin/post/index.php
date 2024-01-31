<h1>Adminnistration des articles</h1>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Titre</th>
      <th scope="col">Date de publication</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
<?php foreach ($params['posts'] as $post): ?>
    <tr>
      <th scope="row"><?= $post->idArticle ?></th>
      <td><?= $post->title ?></td>
      <td><?= $post->getCreatedAt() ?></td>
      <td>
        <a href="#" class="btn btn-warning">Modifier</a>
        <form action="/ProjetsOC/LS_Blog/admin/posts/delete/<?= $post->idArticle ?>" method="POST" class="d-inline">
                        <button type="submit" class="btn btn-danger">Supprimer</button>
      </td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>