<!-- views/admin/comment/index.php -->

<h1>Administration des Commentaires</h1>

<h3>Commentaires à valider</h3>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nickname</th>
      <th scope="col">Titre Article</th>
      <th scope="col">Contenu commentaire</th>
      <th scope="col">Date d'ajout du commentaire</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($params['invalidComments'] as $comment): ?>
        <tr>
          <th scope="row"><?= $comment->idComment ?></th>
          <td><?= $comment->nickname ?></td>
          <td><?= $comment->title ?></td>
          <td><?= $comment->content_Com ?></td>
          <td><?= $comment->creationDate_com ?></td>
          <td>
            <form action="/ProjetsOC/LS_Blog/admin/comments/delete/<?= $comment->idComment ?>" method="POST" class="d-inline">
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
            <form action="/ProjetsOC/LS_Blog/admin/comments/approve/<?= $comment->idComment ?>" method="POST" class="d-inline">
                <button type="submit" class="btn btn-warning">Valider</button>
            </form>
          </td>
        </tr>
    <?php endforeach ?>
  </tbody>
</table>

