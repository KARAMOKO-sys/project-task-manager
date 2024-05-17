projet-final-js/
│
├── src/
    |--database
    |   |--db-config.php
    |   |--models
    |       |--Task.php
    |       |--User.php
│   ├── controller
│   |   └── app.js               # Fichier TypeScript principal contenant la logique de l'application
│   ├── views
|   |   |-- dashboard
|   |   |   |-- home-dashboard.php
│   |   ├── partials             # Dossier pour les fichiers réutilisables (header et footer)
│   |   |   ├── header.php       # Header de l'application avec l'extension .php
│   |   |   └── footer.php       # Footer de l'application avec l'extension .php
│   |   ├── index.php            # Fichier PHP principal de l'application avec l'extension .php
│   |   ├── functionality.php    # Page pour la fonctionnalité de l'application avec l'extension .php
│   |   ├── about-us.php         # Page pour les informations sur l'entreprise avec l'extension .php
│   |   └── contact.php            # Page de contact avec l'extension .php
|   |   |-- authentification
|   |   |    |-- forget-password.php
|   |   |    |-- login.php
|   |   |    |-- sign.php
|   |  
|   |
│   └── styles
│       └── styles.css           # Feuille de style CSS pour styliser l'interface utilisateur
└── assets
    └── images
        └── logo.png             # Logo de l'application

<div class="text-center">
            <form id="task-form">
                <input type="text" id="task-input" placeholder="Add Task...">
                <button type="submit">Add Task</button>
            </form>
         <ul id="task-list"></ul>
</div>


<?php
$host = 'localhost';
$dbname = 'bd_task_manager';
$username = 'root';
$password = '';

try {
    // Connexion à la base de données avec PDO
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Définir le mode d'erreur PDO sur exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie à la base de données MySQL !";
} catch(PDOException $e) {
    die("La connexion a échoué : " . $e->getMessage());
}
?>


Sites de reférence:
-https://taskmanager.fr/;
-https://clickup.com/features/tasks?utm_source=google&utm_medium=cpc&utm_campaign=gs_cpc_arlv_nnc_nb_trial_all-devices_troas_lp_x_all-departments_x_taskmanagement&utm_content=all-countries_kw-target_text_all-industries_all-features_all-use-cases_management_phrase&utm_term=e_online%20task%20management&utm_creative=689606210768_Champion-4272023_rsa&utm_custom1=&utm_custom2=&gad_source=1&gclid=CjwKCAjwupGyBhBBEiwA0UcqaCgPMAwiQp3gdIHABusDXI5iSDYOmf1XszCMywDuTd49hO_h3IJAhhoC7IYQAvD_BwE
-https://todoist.com/fr/home & https://app.todoist.com/app/today 
-


==================================================================================================================
-- Table Users
CREATE TABLE Users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) UNIQUE,
    password_hash VARCHAR(255)
);

-- Table Tasks
CREATE TABLE Tasks (
    task_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    title VARCHAR(100),
    description TEXT,
    status ENUM('Pending', 'In Progress', 'Completed') DEFAULT 'Pending',
    priority ENUM('Low', 'Medium', 'High') DEFAULT 'Medium',
    due_date DATE,
    FOREIGN KEY (user_id) REFERENCES Users(user_id)
);

-- Table Categories
CREATE TABLE Categories (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50)
);

-- Table Task_Categories
CREATE TABLE Task_Categories (
    task_category_id INT AUTO_INCREMENT PRIMARY KEY,
    task_id INT,
    category_id INT,
    FOREIGN KEY (task_id) REFERENCES Tasks(task_id),
    FOREIGN KEY (category_id) REFERENCES Categories(category_id)
);

-- Table Labels
CREATE TABLE Labels (
    label_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50)
);

-- Table Task_Labels
CREATE TABLE Task_Labels (
    task_label_id INT AUTO_INCREMENT PRIMARY KEY,
    task_id INT,
    label_id INT,
    FOREIGN KEY (task_id) REFERENCES Tasks(task_id),
    FOREIGN KEY (label_id) REFERENCES Labels(label_id)
);

-- Table Comments
CREATE TABLE Comments (
    comment_id INT AUTO_INCREMENT PRIMARY KEY,
    task_id INT,
    user_id INT,
    comment TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (task_id) REFERENCES Tasks(task_id),
    FOREIGN KEY (user_id) REFERENCES Users(user_id)
);

-- Table Attachments
CREATE TABLE Attachments (
    attachment_id INT AUTO_INCREMENT PRIMARY KEY,
    task_id INT,
    filename VARCHAR(100),
    filepath VARCHAR(255),
    uploaded_by INT,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (task_id) REFERENCES Tasks(task_id),
    FOREIGN KEY (uploaded_by) REFERENCES Users(user_id)
);

-- Table Task_Assignees
CREATE TABLE Task_Assignees (
    task_assignee_id INT AUTO_INCREMENT PRIMARY KEY,
    task_id INT,
    user_id INT,
    FOREIGN KEY (task_id) REFERENCES Tasks(task_id),
    FOREIGN KEY (user_id) REFERENCES Users(user_id)
);

-- Table Task_History
CREATE TABLE Task_History (
    history_id INT AUTO_INCREMENT PRIMARY KEY,
    task_id INT,
    status ENUM('Pending', 'In Progress', 'Completed') DEFAULT 'Pending',
    updated_by INT,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (task_id) REFERENCES Tasks(task_id),
    FOREIGN KEY (updated_by) REFERENCES Users(user_id)
);
