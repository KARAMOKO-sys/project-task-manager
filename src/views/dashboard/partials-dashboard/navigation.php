<!-- navigation.php -->
<?php
function renderSidebar() {
    ?>
     <div class="sidebar">
        <ul class="nav flex-column">
            <li class="nav-item">
                <button class="btn" onclick="navigateTo('home-controller')"><i class="fa fa-tachometer-alt"></i> Tableau
                    de Bord</button>
            </li>
            <li class="nav-item">
                <button class="btn" onclick="navigateTo('tasks-controller')"><i class="fa fa-tasks"></i> Tâches</button>
            </li>
            <li class="nav-item">
                <button class="btn" onclick="navigateTo('projects-controller')"><i class="fa fa-folder-open"></i>
                    Projets</button>
            </li>
            <li class="nav-item">
                <button class="btn" onclick="navigateTo('team-controller')"><i class="fa fa-users"></i> Équipe</button>
            </li>
            <li class="nav-item">
                <button class="btn" onclick="navigateTo('calendar-controller')"><i class="fa fa-calendar-alt"></i>
                    Calendrier</button>
            </li>
            <li class="nav-item">
                <button class="btn" onclick="navigateTo('time-tracking-controller')"><i class="fa fa-clock"></i> Suivi du
                    Temps</button>
            </li>
            <li class="nav-item">
                <button class="btn" onclick="navigateTo('files-controller')"><i class="fa fa-file"></i> Fichiers</button>
            </li>
            <li class="nav-item">
                <button class="btn" onclick="navigateTo('reports-controller')"><i class="fa fa-file-alt"></i> Rapports</button>
            </li>
            <li class="nav-item">
                <button class="btn" onclick="navigateTo('clients-controller')"><i class="fa fa-users"></i> Clients</button>
            </li>
            <li class="nav-item">
                <button class="btn" onclick="navigateTo('statistics-controller')"><i class="fa fa-chart-bar"></i>
                    Statistiques</button>
            </li>
            <li class="nav-item">
                <button class="btn" onclick="navigateTo('integrations-controller')"><i class="fa fa-plug"></i>
                    Intégrations</button>
            </li>
            <li class="nav-item">
                <button class="btn" onclick="navigateTo('notifications-controller')"><i class="fa fa-bell"></i>
                    Notifications</button>
            </li>
            <li class="nav-item">
                <button class="btn" onclick="navigateTo('chat-controller')"><i class="fa fa-comments"></i>
                    Discussions</button>
            </li>
            <li class="nav-item">
                <button class="btn" onclick="navigateTo('archives-controller')"><i class="fa fa-archive"></i>
                    Archives</button>
            </li>
            <li class="nav-item">
                <button class="btn" onclick="navigateTo('settings-controller')"><i class="fa fa-cog"></i> Paramètres</button>
            </li>
            <li class="nav-item">
                <button class="btn" onclick="navigateTo('help-controller')"><i class="fa fa-question-circle"></i> Aide</button>
            </li>
        </ul>
    </div>
    <?php
}

function navigateTo($url) {
    echo "<script>window.location.href = '$url';</script>";
}
?>
