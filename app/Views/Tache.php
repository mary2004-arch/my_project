<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo App</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <header class="app-header">
    <div class="logo">
      <img src="<?= base_url('assets/images/najj.png') ?>" width="100" alt="Logo">
    </div>
    <div class="profile-menu">
    <i class="fas fa-user-circle profile-icon" onclick="toggleDropdown()"></i>
    <div class="dropdown" id="dropdownMenu" style="display: none;">
        <button onclick="logout()">Déconnexion</button>
    </div>
</div>

    </header>

    <!-- Tabs for Personal and Group Tasks -->
    <div class="tabs">
        <button class="tab active" data-tab="personal">Personal</button>
        <button class="tab" data-tab="group">Group</button>
    </div>

    <!-- Personal Tasks Section -->
    <div class="todo-container" id="personal-tasks">
        <h2>Personal Tasks</h2>
        <div class="input-section">
            <form action="/Tache/createTask" method="post">
                <input type="hidden" name="type" value="personal">
                <input type="text" name="titre" placeholder="New personal task" required>
                <textarea name="description" placeholder="Description"></textarea>
                <button type="submit">Add</button>
            </form>
        </div>
        <ul>
            <?php foreach ($personalTaches as $tache): ?>
                <li class="task-item <?= $tache['statut'] === 'terminée' ? 'completed' : '' ?>">
                    <span><?= esc($tache['titre']) ?> - <?= esc($tache['description']) ?></span>
                    <form action="/Tache/deleteTask/<?= $tache['id'] ?>" method="post" style="display:inline;">
                        <button type="submit">🗑</button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <!-- Group Tasks Section -->
    <div class="todo-container" id="group-tasks" style="display: none;">
        <h2>Group Tasks</h2>
        <div class="input-section">
            <form action="/Tache/createTask" method="post">
                <input type="hidden" name="type" value="group">
                <input type="text" name="titre" placeholder="New group task" required>
                <textarea name="description" placeholder="Description"></textarea>
                <button type="submit">Add</button>
            </form>
        </div>
        <ul>
            <?php foreach ($groupTaches as $tache): ?>
                <li class="task-item <?= $tache['statut'] === 'terminée' ? 'completed' : '' ?>">
                    <span><?= esc($tache['titre']) ?> - <?= esc($tache['description']) ?></span>
                    <form action="/Tache/deleteTask/<?= $tache['id'] ?>" method="post" style="display:inline;">
                        <button type="submit">🗑</button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <script src="<?= base_url('assets/js/script.js') ?>"></script>
</body>
</html>
