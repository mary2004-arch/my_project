<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NoteMade Dashboard</title>
  <link rel="stylesheet" href="<?= base_url('assets/css/styleee.css') ?>"> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    .hidden { display: none; }
  </style>
</head>
<body>

  <aside class="sidebar">
    <div class="logo">
      <img src="<?= base_url('assets/images/najj.png') ?>" alt="Logo" width="150">
    </div>
    <nav class="menu-list">
      <button class="menu-btn" onclick="showSection('dashboard')">
        <i class="fas fa-home"></i> Home
      </button>
      <button class="menu-btn" onclick="showSection('users')">
        <i class="fas fa-users"></i> Manage Users
      </button>
      <button class="menu-btn" onclick="showSection('stats')">
        <i class="fas fa-chart-pie"></i> Statistics
      </button>
    </nav>
  </aside>

  <main class="main-content">
    <header class="header">
      <h1 id="page-title">Home</h1>
      <div class="profile-menu">
        <i class="fas fa-user-circle profile-icon" onclick="toggleDropdown()"></i>
        <div class="dropdown hidden" id="dropdownMenu">
          <button onclick="logout()">Logout</button>
        </div>
      </div>
    </header>

    <!-- Sections -->
    <section id="dashboard" class="content-section">
  <h3>Welcome to the main dashboard, This chart provides a statistical overview of the number of admins and users in the system !</h3>
  <div style="width: 100%; margin: auto;">
    <canvas id="myPieChart"></canvas>
  </div>
</section>


  <!-- Form to Add Users 
  <form action="/addUser" method="post">
    <input type="email" name="email" placeholder="Email" required>
    <select name="role">
      <option value="admin">Admin</option>
      <option value="user">User</option>
    </select>
    <button type="submit">Add</button>
  </form>
  -->
    <section id="users" class="content-section hidden">



  <!-- Search Bar -->
  <div class="search-container">
  
  <input type="text" id="searchBar" placeholder="Search a user..." oninput="searchUser(this.value)">
  <i class="fas fa-search search-icon"></i>
</div>

  <!-- Users Table -->
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Email</th>
        <th>Registration Date</th>
        <th>Role</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody id="userTable">
      <?php if (!empty($users)): ?>
        <?php foreach ($users as $user): ?>
        <tr>
          <td><?= $user['id'] ?></td>
          <td><?= $user['email'] ?></td>
          <td><?= $user['date_inscription'] ?></td>
          <td>
          <select name="role" onchange="updateRole(<?= $user['id'] ?>, this.value)">
            <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
            <option value="user" <?= $user['role'] == 'user' ? 'selected' : '' ?>>User</option>
          </select>
        </td>
          <td>
            <a href="/deleteUser/<?= $user['id'] ?>" onclick="return confirm('Are you sure?')" class="delete-btn">Delete 🗑</a>
          </td>
        </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="5">No users found.</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</section>

    <section id="stats" class="content-section hidden">
      <canvas id="userChart"></canvas><br><br>
    </section>

    <script>
  // Pass PHP data to JavaScript
  const roleData = <?= json_encode($roleData ?? ['admin' => 0, 'user' => 0]) ?>;
  
  // Global variable for the chart
  let myPieChart;

  // Initialize the chart
  function initializeChart(roleData) {
    const ctx = document.getElementById('myPieChart').getContext('2d');
    myPieChart = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: ['Admins', 'Users'],
        datasets: [{
          data: [roleData.admin, roleData.user],
          backgroundColor: [' #DD91C0', '#A8A3D1']
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
      }
    });
  }

  // Fetch updated role data and update the chart
  function updateChart() {
    fetch('<?= base_url("DasController/getRoleData") ?>')
      .then(response => response.json())
      .then(data => {
        myPieChart.data.datasets[0].data = [data.admin, data.user];
        myPieChart.update();
      })
      .catch(error => console.error('Error updating chart:', error));
  }

  // Initialize the chart with initial data
  initializeChart(roleData);

  // Periodically update the chart (every 30 seconds)
  setInterval(updateChart, 30000);
</script>


  <script src="<?= base_url('assets/js/scripttt.js') ?>"></script>
</body>
</html>

