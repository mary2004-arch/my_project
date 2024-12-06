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
            <a href="<?= base_url('tache') ?>" class="menu-btn">Task</a>
            <a href="<?= base_url('goals') ?>" class="menu-btn">Goals</a>
        </div>
        <div class="profile-menu">
            <i class="fas fa-user-circle profile-icon" onclick="toggleDropdown()"></i>
            <div class="dropdown" id="dropdownMenu" style="display: none;">
                <button onclick="logout()">logout</button>
            </div>
        </div>
    </header>

    <div class="content-container">
        <h2>Monthly Goals </h2>
        <form action="<?= base_url('goal/create') ?>" method="post" class="goal-form">
            <input type="text" name="text" placeholder="Enter your goal here..." required />
            <button type="submit">Add Goal</button>
        </form>

      
        <ul class="goal-list">
            <?php foreach ($goals as $goal): ?>
                <li class="<?= $goal['completed'] ? 'completed' : 'not-completed' ?>">
                    <form action="<?= base_url('goal/toggle/' . $goal['id']) ?>" method="post" style="display:inline;">
                        <input type="checkbox" name="completed" <?= $goal['completed'] ? 'checked' : '' ?> 
                            onclick="this.form.submit();" class="goal-checkbox">
                    </form>
                    <span class="goal-text"><?= esc($goal['text']) ?></span>
                    <a href="<?= base_url('goal/delete/' . $goal['id']) ?>" class="delete-btn">🗑</a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
<script src="<?= base_url('assets/js/script.js') ?>"></script>
</html>
