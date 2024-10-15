<!-- files-dashboard.php -->
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
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Arial', sans-serif;
        }

        .container {
            margin-top: 20px;
            padding: 20px;
            margin-left: 7rem;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 2.5em;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        .file-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .file-table th, .file-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .file-table th {
            background-color: #007bff;
            color: white;
        }

        .file-table tr:hover {
            background-color: #f1f1f1;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 20px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .filter-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .filter-container input {
            border: 1px solid #ddd;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: none;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 5px;
        }

        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }
        .container {
            margin-left: 20rem;
            margin-top: 5rem;
        }
    </style>
</head>

<body>
    <?php
        require_once __DIR__ . '/partials-dashboard/navigation.php';
    ?>
    <!-- Sidebar -->
    <?php renderSidebar(); ?>
    <div class="container">
        <div id="dashboard" class="content-section">
            <div class="row">
                <div class="col-md-8 offset-md-1 mt-4">
                    <h1 class="h2">File Task Manager</h1>
                    <div class="filter-container">
                        <input type="text" id="searchFile" placeholder="Rechercher un fichier..." class="form-control">
                        <button id="addFile" class="btn btn-primary">Ajouter un fichier</button>
                    </div>
                    <div id="message" class="alert alert-success" style="display: none;"></div>
                    <table class="file-table" id="fileTable">
                        <thead>
                            <tr>
                                <th>Nom du Fichier</th>
                                <th>Date de Création</th>
                                <th>Taille</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Document A</td>
                                <td>10/01/2024</td>
                                <td>15 KB</td>
                                <td>
                                    <button class="btn btn-primary btn-sm">Télécharger</button>
                                    <button class="btn btn-danger btn-sm">Supprimer</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Rapport B</td>
                                <td>15/02/2024</td>
                                <td>22 KB</td>
                                <td>
                                    <button class="btn btn-primary btn-sm">Télécharger</button>
                                    <button class="btn btn-danger btn-sm">Supprimer</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('addFile').addEventListener('click', function() {
            var fileName = prompt('Entrez le nom du fichier:');
            if (fileName) {
                var table = document.getElementById('fileTable').getElementsByTagName('tbody')[0];
                var newRow = table.insertRow();
                newRow.innerHTML = `
                    <td>${fileName}</td>
                    <td>${new Date().toLocaleDateString()}</td>
                    <td>0 KB</td>
                    <td>
                        <button class="btn btn-primary btn-sm">Télécharger</button>
                        <button class="btn btn-danger btn-sm">Supprimer</button>
                    </td>
                `;
                document.getElementById('message').innerText = 'Fichier ajouté avec succès !';
                document.getElementById('message').style.display = 'block';
                setTimeout(() => {
                    document.getElementById('message').style.display = 'none';
                }, 3000);
            }
        });

        document.getElementById('searchFile').addEventListener('keyup', function() {
            var filter = this.value.toLowerCase();
            var rows = document.querySelectorAll('.file-table tbody tr');
            rows.forEach(row => {
                var fileName = row.cells[0].textContent.toLowerCase();
                row.style.display = fileName.includes(filter) ? '' : 'none';
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
