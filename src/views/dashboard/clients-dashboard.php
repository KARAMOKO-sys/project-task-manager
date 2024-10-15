<!-- clients-dashboard.php -->
<head>
    <!-- Header and style -->
    <?php
    $file = __DIR__ . '/partials-dashboard/header-dashboard.php';
    if (file_exists($file)) {
        require_once $file;
    } else {
        echo "Le fichier $file n'existe pas.";
    }
    ?>

    <!-- Navigation -->
    <?php
        $file = __DIR__ . '/partials-dashboard/nav-bar-dashboard.php';
        if (file_exists($file)) {
            require_once $file;
        } else {
            echo "Le fichier $file n'existe pas.";
        }
    ?>
</head>

<?php
    require_once __DIR__ . '/partials-dashboard/navigation.php';
?>
<!-- Sidebar -->
<?php renderSidebar(); ?>

<div class="container">
    <!-- Main Content -->
     <style>
        body {
            background-color: #f4f6f9;
        }

        .container {
            margin-top: 20px;
            padding: 20px;
        }

        h1 {
            font-size: 2.5em;
            color: #333;
            margin-bottom: 20px;
        }

        .btn-add-client {
            background-color: #007bff;
            border: none;
            color: white;
            border-radius: 5px;
        }

        .btn-add-client:hover {
            background-color: #0056b3;
        }

        .btn-edit {
            background-color: #17a2b8;
            border: none;
            color: white;
            border-radius: 5px;
        }

        .btn-edit:hover {
            background-color: #117a8b;
        }

        .btn-delete {
            background-color: #dc3545;
            border: none;
            color: white;
            border-radius: 5px;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }

        table.dataTable thead th {
            background-color: #007bff;
            color: white;
        }

        table.dataTable tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table.dataTable tbody tr:hover {
            background-color: #e9ecef;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: #fff;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            box-sizing: border-box;
        }

        .title {
            margin-left: 2rem;
        }

        #clientsTable {
            margin-left: 2rem;
        }

        #addClient {
            margin-left: 2rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="title">
            <h1>Clients</h1>
        </div>
        <table id="clientsTable" class="display table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Jean Dupont</td>
                    <td>jean.dupont@example.com</td>
                    <td>0123456789</td>
                    <td>
                        <button class="btn-edit btn btn-sm me-2">Modifier</button>
                        <button class="btn-delete btn btn-sm">Supprimer</button>
                    </td>
                </tr>
                <tr>
                    <td>Marie Curie</td>
                    <td>marie.curie@example.com</td>
                    <td>0987654321</td>
                    <td>
                        <button class="btn-edit btn btn-sm me-2">Modifier</button>
                        <button class="btn-delete btn btn-sm">Supprimer</button>
                    </td>
                </tr>
            </tbody>
        </table>

        <button id="addClient" class="btn-add-client btn btn-lg mt-3">Ajouter un Client</button>
    </div>

    <!-- Modal for Adding a Client -->
    <div id="addClientModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Ajouter un nouveau client</h2>
            <form id="addClientForm">
                <div class="form-group">
                    <label for="clientName">Nom:</label>
                    <input type="text" id="clientName" name="clientName" required>
                </div>
                <div class="form-group">
                    <label for="clientEmail">Email:</label>
                    <input type="email" id="clientEmail" name="clientEmail" required>
                </div>
                <div class="form-group">
                    <label for="clientPhone">Téléphone:</label>
                    <input type="text" id="clientPhone" name="clientPhone" required>
                </div>
                <button type="submit" class="btn-add-client btn btn-lg">Ajouter</button>
            </form>
        </div>
    </div>

    <script>
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
    </script>

    <footer>
        <?php
        $file = __DIR__ . '/partials-dashboard/footer-dashboard.php';
        if (file_exists($file)) {
            require_once $file;
        } else {
            echo "Le fichier $file n'existe pas.";
        }
        ?>
    </footer>
</div>
