 $(document).ready(function() {
            $('#taskTable').DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.21/i18n/French.json'
                }
            });
        });

        function addTask() {
            const taskName = $('#taskName').val();
            const taskDescription = $('#taskDescription').val();
            const dueDate = $('#dueDate').val();
            const assignedTo = $('#assignedTo').val();
            const taskPriority = $('#taskPriority').val();

            const newRow = `<tr>
                                <td>${taskName}</td>
                                <td><span class="badge bg-warning text-dark">En cours</span></td>
                                <td>${dueDate}</td>
                                <td>${assignedTo}</td>
                                <td><span class="badge bg-${getPriorityClass(taskPriority)}">${taskPriority}</span></td>
                                <td>
                                    <button class="btn btn-info btn-sm" onclick="editTask(this)">Modifier</button>
                                    <button class="btn btn-danger btn-sm" onclick="deleteTask(this)">Supprimer</button>
                                </td>
                            </tr>`;
            $('#taskTable tbody').append(newRow);
            $('#addTaskModal').modal('hide');
            $('#taskName').val('');
            $('#taskDescription').val('');
            $('#dueDate').val('');
            $('#assignedTo').val('');
            $('#taskPriority').val('Élevée');
        }

        function getPriorityClass(priority) {
            switch (priority) {
                case 'Élevée':
                    return 'danger';
                case 'Moyenne':
                    return 'warning';
                case 'Faible':
                    return 'secondary';
            }
        }

        function editTask(btn) {
            alert('Modifier la tâche (fonctionnalité à implémenter)');
        }

        function deleteTask(btn) {
            if (confirm('Êtes-vous sûr de vouloir supprimer cette tâche?')) {
                $(btn).closest('tr').remove();
            }
        }