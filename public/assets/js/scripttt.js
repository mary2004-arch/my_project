// 1. Graphiques du tableau de bord
const ctxBar = document.getElementById('userChart').getContext('2d');
new Chart(ctxBar, {
    type: 'bar',
    data: {
        labels: ['Janvier', 'Février', 'Mars'], // Ajoutez des mois dynamiques si nécessaire
        datasets: [{
            label: 'Utilisateurs actifs',
            data: [10, 20, 15], // Remplacez par des données dynamiques
            backgroundColor: 'rgba(75, 192, 192, 0.5)'
        }]
    }
});

const ctxCircle = document.getElementById('roleChart').getContext('2d');
new Chart(ctxCircle, {
    type: 'doughnut',
    data: {
        labels: ['Admins', 'Utilisateurs'],
        datasets: [{
            data: [10, 90], // Remplacez par des données dynamiques
            backgroundColor: ['#FF6384', '#36A2EB']
        }]
    }
});

// 2. Recherche dans le tableau des utilisateurs
document.getElementById('searchBar').addEventListener('keyup', function () {
    const searchTerm = this.value.toLowerCase();
    const rows = document.querySelectorAll('#usersTable tbody tr');
    rows.forEach(row => {
        const text = row.innerText.toLowerCase();
        row.style.display = text.includes(searchTerm) ? '' : 'none';
    });
});

// 3. Gestion des formulaires
function showAddUserForm() {
    document.getElementById('formTitle').innerText = 'Ajouter un utilisateur';
    document.getElementById('userForm').reset();
    document.getElementById('userId').value = '';
    document.getElementById('userFormModal').classList.remove('hidden');
}

function showEditUserForm(userId) {
    // Remplacez avec un appel AJAX pour charger les détails de l'utilisateur
    const userData = { id: userId, name: 'John Doe', email: 'john@example.com', role: 'User', active: 1 }; // Exemple
    document.getElementById('formTitle').innerText = 'Modifier un utilisateur';
    document.getElementById('userId').value = userData.id;
    document.getElementById('name').value = userData.name;
    document.getElementById('email').value = userData.email;
    document.getElementById('role').value = userData.role;
    document.getElementById('active').value = userData.active;
    document.getElementById('userFormModal').classList.remove('hidden');
}

function deleteUser(userId) {
    if (confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')) {
        // Ajoutez une requête AJAX pour supprimer l'utilisateur
        alert(`Utilisateur ${userId} supprimé !`);
    }
}

function closeModal() {
    document.getElementById('userFormModal').classList.add('hidden');
}
// Fonction pour filtrer les utilisateurs dans le tableau
function searchTable() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("searchInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("usersTable");
  tr = table.getElementsByTagName("tr");

  for (i = 1; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td");
      if (td) {
          var matchFound = false;
          for (var j = 0; j < td.length; j++) {
              if (td[j].textContent.toUpperCase().indexOf(filter) > -1) {
                  matchFound = true;
                  break;
              }
          }
          if (matchFound) {
              tr[i].style.display = "";
          } else {
              tr[i].style.display = "none";
          }
      }
  }
}
