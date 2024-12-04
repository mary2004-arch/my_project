<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NoteMade Dashboard</title>
  <link rel="stylesheet" href="<?= base_url('assets/css/styleee.css') ?>"> 
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

  <aside class="sidebar">
 
    <div class="logo">
      <img src="<?= base_url('assets/images/najj.png') ?>" alt="Logo" width="150">
    </div>
    <nav class="menu-list">
      <button class="menu-btn"  onclick="showDashboard()">
        <i class="fas fa-home"></i> Accueil
      </button>
      <button class="menu-btn" onclick="showUsers()">
        <i class="fas fa-users"></i> Gérer les utilisateurs
      </button>
      <button class="menu-btn" onclick="showStats()">
        <i class="fas fa-chart-pie"></i> Statistiques
      </button>
    </nav>
  
  </aside>


  <main class="main-content">
    <header class="header">
        <h1 id="page-title">Bienvenue sur le tableau de bord</h1>

        <div class="profile-menu">
    <i class="fas fa-user-circle profile-icon" onclick="toggleDropdown()"></i>
    <div class="dropdown" id="dropdownMenu" style="display: none;">
        <button onclick="logout()">Déconnexion</button>
    </div>
</div>

    </header>
    <section id="content"></section>
</main>


  <script src="<?= base_url('assets/js/scripttt.js') ?>"></script>
</body>
</html>
