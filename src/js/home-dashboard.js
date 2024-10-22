function showSection(sectionId) {
    const sections = ['dashboard', 'tasks', 'reports', 'clients', 'statistics', 'integrations'];
    sections.forEach(section => {
        document.getElementById(section).style.display = section === sectionId ? 'block' : 'none';
    });
}

document.getElementById('addTaskForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const taskName = document.getElementById('taskName').value;
    const taskDescription = document.getElementById('taskDescription').value;

    fetch('ajouter-tache.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: new URLSearchParams({
            'taskName': taskName,
            'taskDescription': taskDescription
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            addNotification('success', 'Tâche ajoutée avec succès !');
            // Ajouter la tâche à la liste
            const taskItem = document.createElement('div');
            taskItem.classList.add('task-item');
            taskItem.textContent = `${taskName}: ${taskDescription}`;
            document.querySelector('.task-list').appendChild(taskItem);
            document.getElementById('addTaskForm').reset();
        }
    })
    .catch(error => addNotification('danger', 'Erreur lors de l\'ajout de la tâche.'));
});

function addNotification(type, message) {
    const notificationContainer = document.getElementById('notifications');
    const alert = document.createElement('div');
    alert.className = `alert alert-${type}`;
    alert.textContent = message;
    notificationContainer.appendChild(alert);
    setTimeout(() => {
        alert.remove();
    }, 5000); // La notification disparaît après 5 secondes
}

function updateClock() {
    const now = new Date();
    const hours = String(now.getHours()).padStart(2, '0');
    const minutes = String(now.getMinutes()).padStart(2, '0');
    const seconds = String(now.getSeconds()).padStart(2, '0');
    document.getElementById('clock').textContent = `${hours}:${minutes}:${seconds}`;
}

setInterval(updateClock, 1000);
updateClock(); // Initial call

document.addEventListener('DOMContentLoaded', () => {
    // Charger les tâches existantes
    fetch('recuperer-taches.php')
        .then(response => response.json())
        .then(tasks => {
            tasks.forEach(task => {
                const taskItem = document.createElement('div');
                taskItem.classList.add('task-item');
                taskItem.textContent = `${task.task_name}: ${task.task_description}`;
                document.querySelector('.task-list').appendChild(taskItem);
            });
        });
});



/**
 ====================================================================================================================
 */

 var ctx = document.getElementById('performanceChart').getContext('2d');
        var performanceChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet'],
                datasets: [{
                    label: 'Projets terminés',
                    data: [12, 19, 3, 5, 2, 3, 7],
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2,
                    fill: false
                }, {
                    label: 'Tâches terminées',
                    data: [10, 15, 13, 8, 10, 7, 9],
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 2,
                    fill: false
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                responsive: true,
                maintainAspectRatio: false
            }
        });