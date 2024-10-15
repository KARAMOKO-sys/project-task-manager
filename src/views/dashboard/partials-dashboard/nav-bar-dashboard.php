  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">
            <img src="https://via.placeholder.com/30" alt="Logo"> Gestion des Tâches
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#"><i class="fa fa-home"></i> Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-cog"></i> Paramètres</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-user"></i> Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-sign-out-alt"></i> Déconnexion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><img src="https://via.placeholder.com/30" alt="Photo de profil"></a>
                    <span class="text-white">
                        <?php echo isset($username) ? htmlspecialchars($username, ENT_QUOTES, 'UTF-8') : 'Utilisateur'; ?>
                    </span>
                </li>
            </ul>
        </div>
    </nav>
