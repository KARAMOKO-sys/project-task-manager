  $(document).ready(function () {
            var clientsTable = $('#clientsTable').DataTable();

            // Open modal on button click
            $('#addClient').click(function () {
                $('#addClientModal').show();
            });

            // Close modal when clicking close button
            $('.close').click(function () {
                $('#addClientModal').hide();
            });

            // Add client form submission
            $('#addClientForm').submit(function (e) {
                e.preventDefault();

                var clientName = $('#clientName').val();
                var clientEmail = $('#clientEmail').val();
                var clientPhone = $('#clientPhone').val();

                // Add new client to table
                clientsTable.row.add({
                    '0': clientName,
                    '1': clientEmail,
                    '2': clientPhone,
                    '3': '<button class="btn-edit btn btn-sm me-2">Modifier</button><button class="btn-delete btn btn-sm">Supprimer</button>'
                }).draw();

                // Close modal
                $('#addClientModal').hide();

                // Clear form fields
                $('#clientName').val('');
                $('#clientEmail').val('');
                $('#clientPhone').val('');
            });

            // Delete client row
            $('#clientsTable').on('click', '.btn-delete', function () {
                var row = clientsTable.row($(this).parents('tr'));
                if (confirm('Voulez-vous vraiment supprimer ce client?')) {
                    row.remove().draw();
                }
            });
        });