// Show Dashboard Content
function showDashboard() {
    document.getElementById("content").innerHTML = `
        <h4>Bienvenue sur le tableau de bord principal. Sélectionnez une option dans la barre latérale.</h4>
    `;
    document.getElementById("page-title").textContent = "Accueil";
}
function toggleDropdown() {
    const dropdown = document.getElementById('dropdownMenu');
    dropdown.style.display = dropdown.style.display === 'none' ? 'block' : 'none';
}

function logout() {
    // Display the alert
    alert("You have logged out.");
    
    // Redirect the user to the backend logout endpoint
    window.location.href = '/auth'; // Replace with your actual logout URL
}

// Show Users Section with Table and Form
function showUsers() {
    document.getElementById("content").innerHTML = `
        <h3>Gérer les utilisateurs</h3>
        <form action="/addUser" method="post">
            <input type="text" name="name" placeholder="Nom" required>
            <input type="email" name="email" placeholder="Email" required>
            <select name="role">
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>
            <button type="submit">Ajouter</button>
        </form>
        <input type="text" id="searchBar" placeholder="Rechercher un utilisateur...">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Rôle</th>
                </tr>
            </thead>
            <tbody id="userTable">
                <!-- Data will be populated dynamically -->
            </tbody>
        </table>
    `;
    document.getElementById("page-title").textContent = "Gérer les utilisateurs";
}


function showStats() {
    document.getElementById("content").innerHTML = `
        <h3>Statistiques</h3>
        <canvas id="userChart"></canvas><br><br><br>
        <canvas id="roleChart"></canvas>
    `;
    document.getElementById("page-title").textContent = "Statistiques";
    renderCharts();
}

function show() {
    document.getElementById("content").innerHTML = '<canvas id="userChart"></canvas>';

    // Code pour afficher un graphique (exemple avec Chart.js)
    const ctx = document.getElementById('userChart').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'bar', // ou 'line', 'pie', etc.
        data: {
            labels: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai'],
            datasets: [{
                label: 'Exemple de données',
                data: [10, 20, 30, 40, 50],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
            },
        }
    });
}
document.addEventListener("DOMContentLoaded", show);

// Appeler la fonction automatiquement après le chargement de la page


function renderCharts() {
    const userChart = new Chart(document.getElementById("userChart"), {
        type: 'bar', // ou 'line', 'pie', etc.
        data: {
            labels: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai'],
            datasets: [{
                label: 'Exemple de données',
                data: [10, 20, 30, 40, 50],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
            },
        }
    });
    const roleChart = new Chart(document.getElementById("roleChart"), {
        type: "pie",
        data: {
            labels: ["Admins", "Users"],
            datasets: [{
                data: [3, 7], // Example data
                backgroundColor: [" #C27BA0", "#A8A3D1"]
            }]
        },
        options: { responsive: true }
    });

    
}



