<h1>Page d'administration</h1>

<?php if(isset($_GET['success']) && $_GET['success']): ?>

<div class="alert-success">Vous etes connecté</div>

<?php endif ?>

<ol class="list-group list-group-numbered">
  <li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
      <div class="fw-bold">Les articles</div>
      Content for list item
    </div>
    <a href="/ProjetsOC/LS_Blog/admin/posts">Consulter</a>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
      <div class="fw-bold">Les Utilisateur</div>
      Content for list item
    </div>
    <a href="/ProjetsOC/LS_Blog/admin/posts">Consulter</a>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
      <div class="fw-bold">Les Commentaires</div>
      Content for list item
    </div>
    <a href="/ProjetsOC/LS_Blog/admin/posts">Consulter</a>
  </li>
</ol>