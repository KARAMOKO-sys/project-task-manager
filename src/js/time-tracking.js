 document.addEventListener('DOMContentLoaded', function() {
        const taskList = document.getElementById('taskList');
        const saveTaskButton = document.getElementById('saveTask');

        saveTaskButton.addEventListener('click', function() {
            const title = document.getElementById('taskTitle').value;
            const description = document.getElementById('taskDescription').value;
            const startDate = document.getElementById('taskStartDate').value;
            const endDate = document.getElementById('taskEndDate').value;
            const status = document.getElementById('taskStatus').value;

            if (title && description && startDate && endDate && status) {
                const newRow = `
                    <tr>
                        <td>${Date.now()}</td>
                        <td>${title}</td>
                        <td>${description}</td>
                        <td>${startDate}</td>
                        <td>${endDate}</td>
                        <td>${status}</td>
                        <td>
                            <button class="btn btn-warning btn-sm" onclick="editTask(this)">Modifier</button>
                            <button class="btn btn-danger btn-sm" onclick="deleteTask(this)">Supprimer</button>
                        </td>
                    </tr>
                `;
                taskList.insertAdjacentHTML('beforeend', newRow);
                $('#addTaskModal').modal('hide');
                document.getElementById('addTaskForm').reset();
            }
        });
    });

    function editTask(button) {
        // Logic to edit the task
        alert("Modification de la tâche");
    }

    function deleteTask(button) {
        const row = button.closest('tr');
        row.remove();
    }