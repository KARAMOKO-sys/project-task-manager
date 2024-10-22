  $(document).ready(function() {
            var teamTable = $('#teamTable').DataTable({
                ajax: {
                    url: 'fetch-team.php',
                    dataSrc: ''
                },
                columns: [
                    { data: 'nom' },
                    { data: 'role' },
                    { data: 'email' },
                    { data: 'telephone' },
                    { data: 'adresse' },
                    { data: null, render: function(data) {
                        return '<button class="btn btn-custom btn-edit">Modifier</button> ' +
                               '<button class="btn btn-delete btn-delete">Supprimer</button>';
                    }}
                ]
            });

            $('#addMember').click(function() {
                $('#addMemberModal').modal('show');
            });

            $('#addMemberForm').submit(function(e) {
                e.preventDefault();
                // Logic to add member (e.g., AJAX request)
                $('#addMemberModal').modal('hide');
                // Reload table data
                teamTable.ajax.reload();
            });

            $('#teamTable').on('click', '.btn-delete', function() {
                var row = teamTable.row($(this).parents('tr'));
                $('#confirmDeleteModal').modal('show');

                $('#confirmDeleteBtn').off('click').on('click', function() {
                    // Deletion logic here (e.g., AJAX request)
                    row.remove().draw();
                    $('#confirmDeleteModal').modal('hide');
                });
            });
        });