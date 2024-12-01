<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord</title>
    <link rel="stylesheet" href="assets/css/styleee.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<div class="container">
    <h2>Gérer les Utilisateurs</h2>
    <button class="btn btn-primary" onclick="window.location.href='/add-user'">Ajouter un utilisateur</button>

    <!-- Input de recherche -->
    <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Rechercher par nom ou email" class="form-control mt-3" style="width: 300px;">

    <h3>Statistiques</h3>
    <div class="row">
        <div class="col-md-4">
            <p><strong>Administrateurs : </strong><?= $admins; ?></p>
        </div>
        <div class="col-md-4">
            <p><strong>Utilisateurs : </strong><?= $users; ?></p>
        </div>
        <div class="col-md-4">
            <p><strong>Utilisateurs Actifs : </strong><?= $activeUsers; ?></p>
        </div>
    </div>

    <h3>Liste des Utilisateurs</h3>
    <table class="table mt-3" id="usersTable">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Rôle</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usersList as $user): ?>
                <tr>
                    <td><?= $user['name']; ?></td>
                    <td><?= $user['email']; ?></td>
                    <td><?= $user['role']; ?></td>
                    <td><?= $user['active'] ? 'Actif' : 'Inactif'; ?></td>
                    <td>
                        <a href="/edit-user/<?= $user['id']; ?>" class="btn btn-warning">Modifier</a>
                        <a href="/delete-user/<?= $user['id']; ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur?')">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


    <script src="assets/js/scripttt.js"></script>
</body>
</html>
