function showSection(sectionId) {
    const sections = document.querySelectorAll('.content-section');
    sections.forEach(section => {
      section.classList.add('hidden');
    });
    document.getElementById(sectionId).classList.remove('hidden');

    // Mettre à jour le titre de la page
    const titles = {
      'dashboard': 'Home',
      'users': 'Manage Users',
      'stats': 'Statistics'
    };
    document.getElementById('page-title').textContent = titles[sectionId];
  }

  function toggleDropdown() {
    const dropdown = document.getElementById('dropdownMenu');
    dropdown.classList.toggle('hidden');
  }

  function logout() {
    // Afficher l'alerte
    alert("You have logged out.");
    
    // Rediriger l'utilisateur vers l'endpoint de déconnexion
    window.location.href = '/auth'; // Remplacer par votre URL de déconnexion réelle
}

 

  function searchUser(keyword) {
    const rows = document.querySelectorAll('#userTable tr');
    keyword = keyword.toLowerCase();

    rows.forEach(row => {
        const cells = row.querySelectorAll('td');
        if (cells.length > 0) {
            const id = cells[0].textContent.toLowerCase();
            const email = cells[1].textContent.toLowerCase();

            if (id.includes(keyword) || email.includes(keyword)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        }
    });
}
function updateRole(userId, newRole) {
  // Send the updated role to the server using AJAX or redirect with POST method
  fetch(`/updateUserRole/${userId}`, {
      method: 'POST',
      headers: {
          'Content-Type': 'application/json',
      },
      body: JSON.stringify({ role: newRole })
  })
  .then(response => response.json())
  .then(data => {
      if (data.success) {
          alert("Role updated successfully!");
      } else {
          alert("Failed to update role.");
      }
  })
  .catch(error => console.error("Error:", error));
}




  document.addEventListener("DOMContentLoaded", () => {
    const userChart = new Chart(document.getElementById("userChart"), {
      type: 'bar',
      data: {
        labels: ['2 December', '3 December', '4 December', '5 December', '6 December'],
        datasets: [{
          label: 'Active Users',
          data: [2, 1, 1, 2, 4],
          backgroundColor: 'rgba(75, 192, 192, 0.2)',
          borderColor: 'rgba(75, 192, 192, 1)',
          borderWidth: 1
        }]
      },
      options: { responsive: true }
    });})

