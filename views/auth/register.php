<h1>S'inscrire</h1>

<form action="/ProjetsOC/LS_Blog/register" method="POST">


    <div class="form-group">
        <label for="nickname">Nom d'utilisateur</label>
        <input type="text" class="form-control" name="nickname" id="nickname">
    </div>
    <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" class="form-control" name="password" id="password">
    </div>
    <div class="form-group">
        <label for="phone">Numéro de téléphone:</label>
        <input type="text" id="phone" name="phone" required>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
    </div>

    
    <button type="submit" class="btn btn-primary">S'inscrire </button>

</form>