<!-- chat-dashboard.php -->
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
            font-family: 'Arial', sans-serif;
        }

        .container {
            margin-top: 20px;
            padding: 20px;
            margin-left: 7rem;
        }

        h1 {
            font-size: 2.5em;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        .chat-box {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            height: 300px;
            overflow-y: auto;
            background-color: #f8f9fa;
            margin-bottom: 20px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .chat-box .message {
            margin-bottom: 15px;
        }

        .chat-box .message .sender {
            font-weight: bold;
            color: #007bff;
        }

        .chat-box .message .text {
            margin-top: 5px;
        }

        .input-group {
            display: flex;
            align-items: center;
        }

        textarea {
            border-radius: 5px;
            border: 1px solid #ddd;
            padding: 10px;
            flex-grow: 1;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            margin-left: 10px;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-attachment {
            background-color: #6c757d;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-attachment:hover {
            background-color: #5a6268;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: none;
        }

        .chat-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .chat-header h2 {
            font-size: 1.8em;
            color: #333;
        }

        .filter-date {
            display: flex;
            justify-content: flex-end;
        }

        .filter-date input {
            border: 1px solid #ddd;
            padding: 5px 10px;
            border-radius: 5px;
        }

    </style>

</head>

<body>
    <div class="container">
        <div class="chat-header">
            <h2>Discussions</h2>
            <div class="filter-date">
                <input type="date" id="filterDate" placeholder="Filtrer par date">
            </div>
        </div>
        <div class="chat-box" id="chatBox">
            <!-- Chat messages will be displayed here -->
            <div class="message">
                <div class="sender">Alice:</div>
                <div class="text">Bonjour, comment ça va ?</div>
            </div>
            <div class="message">
                <div class="sender">Bob:</div>
                <div class="text">Ça va bien, merci ! Et toi ?</div>
            </div>
        </div>

        <div class="input-group">
            <textarea id="messageInput" class="form-control" rows="3" placeholder="Tapez votre message ici..."></textarea>
            <button id="sendMessage" class="btn btn-primary">Envoyer</button>
            <button id="attachFile" class="btn btn-attachment">Joindre un fichier</button>
        </div>
    </div>

    <script>
        document.getElementById('sendMessage').addEventListener('click', function() {
            var message = document.getElementById('messageInput').value;
            if (message) {
                var chatBox = document.getElementById('chatBox');
                var newMessage = document.createElement('div');
                newMessage.className = 'message';
                newMessage.innerHTML = `
                    <div class="sender">Vous:</div>
                    <div class="text">${message}</div>
                `;
                chatBox.appendChild(newMessage);
                chatBox.scrollTop = chatBox.scrollHeight; // Scroll to the bottom
                document.getElementById('messageInput').value = '';
            } else {
                alert('Veuillez entrer un message.');
            }
        });

        document.getElementById('attachFile').addEventListener('click', function() {
            alert('Fonctionnalité de fichier attaché à implémenter.');
        });

        document.getElementById('filterDate').addEventListener('change', function() {
            var filterDate = this.value;
            // Logique de filtrage par date à implémenter
            alert('Filtrage par date sélectionnée : ' + filterDate);
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
