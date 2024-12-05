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
      <img src="<?= base_url('assets/images/najj.png') ?>" width="130" alt="Logo">
    </div>
 
        <h1> NOTEMADE TODO LIST </h1>
        <div class="menu">
      <!-- Update the buttons to redirect to the correct routes -->
<a href="<?= base_url('tache') ?>" class="menu-btn">Task</a>
<a href="<?= base_url('goals') ?>" class="menu-btn">Goals</a>

</div>
    <div class="profile-menu">
    <i class="fas fa-user-circle profile-icon" onclick="toggleDropdown()"></i>
    <div class="dropdown" id="dropdownMenu" style="display: none;">
        <button onclick="logout()">Déconnexion</button>
    </div>
</div>

    </header>



<!-- app/Views/Tache.php -->
<div class="tabs">
        <button class="tab active" data-tab="personal">Personal</button>
        <button class="tab" data-tab="group">Group</button>
    </div>

    <!-- Formulaire de création ou d'édition de tâche -->
    <div class="todo-container" id="personal-tasks">
        <h2>Personal Tasks</h2>
        <div class="input-section">
            <!-- Formulaire dynamique : Création ou édition de tâche -->
            <form action="<?= isset($task) ? '/Tache/updateTask/' . $task['id'] : '/Tache/createTask' ?>" method="post">
                <input type="hidden" name="type" value="personal">
                <input type="text" name="titre" value="<?= isset($task) ? esc($task['titre']) : '' ?>" placeholder="New task" required>
                <textarea name="description" placeholder="Description"><?= isset($task) ? esc($task['description']) : '' ?></textarea>
                
                <!-- Bouton qui change selon si c'est un ajout ou une mise à jour -->
                <button type="submit"><?= isset($task) ? 'Update' : 'Add' ?></button>
            </form>
        </div>

        <!-- Tableau des Tâches -->
        <table>
            <thead>
                <tr>
                    <th>Task</th>
                    <th>Description</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($personalTaches as $tache): ?>
                    <tr>
                        <td><?= esc($tache['titre']) ?></td>
                        <td><?= esc($tache['description']) ?></td>
                        <td>
                        <a href="<?= current_url() ?>?edit_id=<?= $tache['id'] ?>">
                                <select name="statut" onchange="this.form.submit()">
                                    <option value="en attente" <?= $tache['statut'] === 'en attente' ? 'selected' : '' ?>>En attente</option>
                                    <option value="en cours" <?= $tache['statut'] === 'en cours' ? 'selected' : '' ?>>En cours</option>
                                    <option value="terminée" <?= $tache['statut'] === 'terminée' ? 'selected' : '' ?>>Terminée</option>
                                </select>
                </a>
                        </td>
                        <td>
                            <!-- Edit Button : Lien pour éditer la tâche en remplissant le formulaire au-dessus -->
                            <a href="<?= current_url() ?>?edit_id=<?= $tache['id'] ?>" class="edit-btn">Edit✏️</a>

                            <!-- Delete Button -->
                            <form action="/Tache/deleteTask/<?= $tache['id'] ?>" method="post" style="display:inline;">
                                <button type="submit" class="delete-btn">Delete🗑</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
    </div>


<!-- Tâches de Groupe -->
<div class="todo-container" id="group-tasks" style="display: none;">
    <h2>Group Tasks</h2>
   
    <div class="input-section">
            <!-- Formulaire dynamique : Création ou édition de tâche -->
            <form action="<?= isset($task) ? '/Tache/updateTask/' . $task['id'] : '/Tache/createTask' ?>" method="post">
            <input type="hidden" name="type" value="group">
                <input type="text" name="titre" value="<?= isset($task) ? esc($task['titre']) : '' ?>" placeholder="New task" required>
                <textarea name="description" placeholder="Description"><?= isset($task) ? esc($task['description']) : '' ?></textarea>
                
                <!-- Bouton qui change selon si c'est un ajout ou une mise à jour -->
                <button type="submit"><?= isset($task) ? 'Update' : 'Add' ?></button>
            </form>
        </div>
    
    <!-- Tableau des Tâches de Groupe -->
    <table>
        <thead>
            <tr>
                <th>Task</th>
                <th>Description</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($groupTaches as $tache): ?>
                <tr>
                    <td><?= esc($tache['titre']) ?></td>
                    <td><?= esc($tache['description']) ?></td>
                    <td>
                    <a href="<?= current_url() ?>?edit_id=<?= $tache['id'] ?>">
                            <select name="statut" onchange="this.form.submit()">
                                <option value="en attente" <?= $tache['statut'] === 'en attente' ? 'selected' : '' ?>>En attente</option>
                                <option value="en cours" <?= $tache['statut'] === 'en cours' ? 'selected' : '' ?>>En cours</option>
                                <option value="terminée" <?= $tache['statut'] === 'terminée' ? 'selected' : '' ?>>Terminée</option>
                            </select>
            </a>
                    </td>
                    <td>
                        <!-- Edit Button -->
                     
                        <a href="<?= current_url() ?>?edit_id=<?= $tache['id'] ?>" class="edit-btn">Edit✏️</a>
                   
                        <!-- Delete Button -->
                        <form action="/Tache/deleteTask/<?= $tache['id'] ?>" method="post" style="display:inline;">
                            <button type="submit"  class="delete-btn">Delete🗑</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>





    <script src="<?= base_url('assets/js/script.js') ?>"></script>

</body>
</html>
