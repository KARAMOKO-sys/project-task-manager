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
        }

        .container {
            margin-top: 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 2.5em;
            color: #333;
            margin-bottom: 20px;
        }

        .chat-box {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            height: 300px;
            overflow-y: auto;
            background-color: #f8f9fa;
            margin-bottom: 10px;
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

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        textarea {
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Discussions</h1>
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
        <textarea id="messageInput" class="form-control" rows="3" placeholder="Tapez votre message ici..."></textarea>
        <button id="sendMessage" class="btn btn-primary mt-2">Envoyer</button>
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
