<!-- header.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <link rel="stylesheet" href="../../styles/styles.css"> <!-- Chemin d'accès corrigé pour le fichier CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand text-white" href="#">
                <img src="../assets/images/logo.png" width="60" height="40" class="d-inline-block align-top">
                Task Manager
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../views/index.php" id="home-page">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../views/functionality.php" id="all-tasks">Functionality</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../views/about-us.php" id="about-us">About us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../views/contact.php" id="contact-us">Contact us</a>
                    </li>
                </ul>
            </div>
            <div class="d-flex">
                <a href="../views/authentification/login.php" class="btn btn-primary">Login</a>
            </div>
            <div class="m-2">
                <i class="fas fa-user"></i>           
            </div>
        </div>
    </nav>
