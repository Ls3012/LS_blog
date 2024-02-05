<!-- views/admin/user/index.php -->

<h1>Administration des Utilisateurs</h1>

<h3>Adminnistrateurs</h3>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nickname</th>
      <th scope="col">Email</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($params['adminUsers'] as $user): ?>
        <tr>
          <th scope="row"><?= $user->idUser ?></th>
          <td><?= $user->nickname ?></td>
          <td><?= $user->email ?></td>
          <td>
            <form action="/ProjetsOC/LS_Blog/admin/users/delete/<?= $user->idUser ?>" method="POST" class="d-inline">
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
            <form action="/ProjetsOC/LS_Blog/admin/users/change-status/<?= $user->idUser ?>" method="POST" class="d-inline">
                <button type="submit" class="btn btn-warning">Passer admin</button>
            </form>
          </td>
        </tr>
    <?php endforeach ?>
  </tbody>
</table>

<h3>Utilisateurs</h3>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nickname</th>
      <th scope="col">Email</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($params['users'] as $user): ?>
        <tr>
          <th scope="row"><?= $user->idUser ?></th>
          <td><?= $user->nickname ?></td>
          <td><?= $user->email ?></td>
          <td>
            <form action="/ProjetsOC/LS_Blog/admin/users/delete/<?= $user->idUser ?>" method="POST" class="d-inline">
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
            <form action="/ProjetsOC/LS_Blog/admin/users/change-status/<?= $user->idUser ?>" method="POST" class="d-inline">
                <button type="submit" class="btn btn-warning">Passer user</button>
            </form>
          </td>
        </tr>
    <?php endforeach ?>
  </tbody>
</table>
