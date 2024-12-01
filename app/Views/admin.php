<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Admin</title>
    <link rel="stylesheet" href="<?= base_url('public/assets/css/style.css') ?>">
</head>
<body>

    <div class="sidebar">
        <h2>Admin Dashboard</h2>
        <ul>
            <li><a href="#">Accueil</a></li>
            <li><a href="#">Utilisateurs</a></li>
            <li><a href="#">Produits</a></li>
            <li><a href="#">Paramètres</a></li>
        </ul>
    </div>

    <div class="main-content">
        <header>
            <h1>Bienvenue sur le tableau de bord</h1>
        </header>

        <section class="stats">
            <div class="stat-card">
                <h3>Utilisateurs</h3>
                <p>150</p>
            </div>
            <div class="stat-card">
                <h3>Produits</h3>
                <p>30</p>
            </div>
            <div class="stat-card">
                <h3>Commandes</h3>
                <p>75</p>
            </div>
        </section>
    </div>

</body>
</html>
