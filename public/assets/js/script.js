document.getElementById('add-task-btn').addEventListener('click', function() {
    let taskInput = document.getElementById('task-input').value;
    if (taskInput !== '') {
        // Logique pour ajouter la tâche (par exemple, en appelant l'API ou en ajoutant dynamiquement)
        alert('Task Added; ' + taskInput);
    }
});
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

document.querySelectorAll('.tab').forEach(tab => {
    tab.addEventListener('click', () => {
        document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
        tab.classList.add('active');
        
        document.querySelectorAll('.todo-container').forEach(section => {
            section.style.display = 'none';
        });

        const target = tab.dataset.tab === 'personal' ? '#personal-tasks' : '#group-tasks';
        document.querySelector(target).style.display = 'block';
    });
});