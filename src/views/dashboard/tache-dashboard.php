<!--  
<div id="tasks" style="display: none;">
        <h1 class="h2">Gestion des Tâches</h1>
        <div class="task-form">
            <form id="addTaskForm">
                <div class="form-group">
                    <label for="taskName">Nom de la Tâche</label>
                    <input type="text" class="form-control" id="taskName" required>
                </div>
                <div class="form-group">
                    <label for="taskDescription">Description</label>
                    <textarea class="form-control" id="taskDescription" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Ajouter la Tâche</button>
            </form>
        </div>
        <div class="task-list">
        <?php foreach ($tasks as $task): ?>
                <div class="task-item">
                <p class="card-text">
                <?php 
                if (isset($stats)) {
                    echo $stats['tasks_in_progress'];
                } else {
                    echo "N/A"; // Message par défaut si les stats ne sont pas disponibles
                }
                ?>
            </p>              
        </div>
            <?php endforeach; ?>
        </div>
    </div>  
-->
