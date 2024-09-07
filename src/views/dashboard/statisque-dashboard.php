<link rel="stylesheet" href="<?php echo BASE_URL; ?>/styles/home-dashboard.scss">
<div id="statistics" style="display: none;">
    <h1 class="h2">Statistiques</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm stat-card">
                <div class="card-body">
                    <h5 class="card-title">Tâches en cours</h5>
                    <p class="card-text"><?php echo $stats['tasks_in_progress']; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm stat-card">
                <div class="card-body">
                    <h5 class="card-title">Tâches terminées</h5>
                    <p class="card-text"><?php echo $stats['tasks_completed']; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm stat-card">
                <div class="card-body">
                    <h5 class="card-title">Tâches en retard</h5>
                    <p class="card-text"><?php echo $stats['tasks_overdue']; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
