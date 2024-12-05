// Gérer les onglets "Task" (personnel et groupe)
document.querySelectorAll('.tab').forEach(tab => {
    tab.addEventListener('click', () => {
        // Debugging the tab click event
        console.log('Tab clicked:', tab);

        document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
        tab.classList.add('active');

        document.querySelectorAll('.todo-container').forEach(section => {
            section.style.display = 'none';
        });

        const target = tab.dataset.tab === 'personal' ? '#personal-tasks' : '#group-tasks';
        console.log('Target section:', target); // Debug the target section
        document.querySelector(target).style.display = 'block';
    });
});

// Gérer les menus "Accueil", "Task", "Calendrier", "Goals"
document.querySelectorAll('.menu-btn').forEach(menuBtn => {
    menuBtn.addEventListener('click', () => {
        const targetSection = menuBtn.getAttribute('data-section');
        console.log('Menu clicked:', targetSection);

        // Masquer toutes les sections de contenu
        document.querySelectorAll('.content').forEach(content => {
            content.style.display = 'none';
        });

        // Afficher la section correspondante
        document.getElementById(`${targetSection}-content`).style.display = 'block';

        // Activer le bouton du menu
        document.querySelectorAll('.menu-btn').forEach(btn => btn.classList.remove('active'));
        menuBtn.classList.add('active');
    });
});




// Fonction pour afficher/masquer le menu déroulant
function toggleDropdown() {
    const dropdown = document.getElementById('dropdownMenu');
    dropdown.style.display = dropdown.style.display === 'none' ? 'block' : 'none';
}

// Fonction de déconnexion
function logout() {
    // Afficher l'alerte
    alert("You have logged out.");
    
    // Rediriger l'utilisateur vers l'endpoint de déconnexion
    window.location.href = '/auth'; // Remplacer par votre URL de déconnexion réelle
}

// Changer dynamiquement la couleur du <select> en fonction de la valeur sélectionnée
document.querySelectorAll('select[name="statut"]').forEach(select => {
    const updateColor = () => {
        if (select.value === 'en attente') {
            select.style.backgroundColor = '#FFF3E6'; // Light orange
            select.style.color = '#E67E22'; // Dark orange
        } else if (select.value === 'en cours') {
            select.style.backgroundColor = '#E8F5FF'; // Light blue
            select.style.color = '#3498DB'; // Blue
        } else if (select.value === 'terminée') {
            select.style.backgroundColor = '#EBF9EB'; // Light green
            select.style.color = '#2ECC71'; // Green
        }
    };
    // Mettre à jour la couleur lors du changement
    updateColor();
    select.addEventListener('change', updateColor);
});

// Mettre en surbrillance une ligne de tableau au survol
document.querySelectorAll("table tbody tr").forEach(row => {
    row.addEventListener("mouseenter", () => {
        row.style.boxShadow = "0px 2px 10px rgba(0, 0, 0, 0.1)";
    });
    row.addEventListener("mouseleave", () => {
        row.style.boxShadow = "none";
    });
});

// Trier les colonnes de tableau dynamiquement (Exemple pour la colonne "Task")
document.querySelectorAll("th").forEach((header, index) => {
    header.addEventListener("click", () => {
        const table = header.closest("table");
        const rows = Array.from(table.querySelectorAll("tbody tr"));
        const isAscending = header.classList.contains("ascending");
        
        rows.sort((a, b) => {
            const aText = a.children[index].innerText.toLowerCase();
            const bText = b.children[index].innerText.toLowerCase();
            return isAscending ? aText.localeCompare(bText) : bText.localeCompare(aText);
        });
        
        header.classList.toggle("ascending", !isAscending);
        header.classList.toggle("descending", isAscending);
        rows.forEach(row => table.querySelector("tbody").appendChild(row));
    });
});




