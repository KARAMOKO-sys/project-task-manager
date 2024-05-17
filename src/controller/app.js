//app.js

document.addEventListener('DOMContentLoaded', function() {
    const taskForm = document.getElementById('task-form');
    const taskInput = document.getElementById('task-input');
    const taskList = document.getElementById('task-list');
    const allTasksLink = document.getElementById('all-tasks');
    const completedTasksLink = document.getElementById('completed-tasks');
    const incompleteTasksLink = document.getElementById('incomplete-tasks');

    let tasks = [];

    taskForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const taskName = taskInput.value.trim();
        if (taskName !== '') {
            addTask(taskName);
            taskForm.reset();
        }
    });

    function addTask(taskName) {
        const task = { id: Date.now(), name: taskName, completed: false, important: false };
        tasks.push(task);
        renderTasks();
    }

    function renderTasks() {
        taskList.innerHTML = '';
        tasks.forEach(function(task) {
            const taskItem = document.createElement('li');
            taskItem.className = 'task-item';
            if (task.completed) {
                taskItem.classList.add('completed');
            }
            if (task.important) {
                taskItem.classList.add('important');
            }
            taskItem.innerHTML = `
                <input type="checkbox" ${task.completed ? 'checked' : ''}>
                <span>${task.name}</span>
                <button class="edit-btn">Edit</button>
                <button class="delete-btn">Delete</button>
                <button class="important-btn">${task.important ? 'Unmark Important' : 'Mark Important'}</button>
            `;
            taskList.appendChild(taskItem);

            const deleteBtn = taskItem.querySelector('.delete-btn');
            deleteBtn.addEventListener('click', function() {
                deleteTask(task.id);
            });

            const editBtn = taskItem.querySelector('.edit-btn');
            editBtn.addEventListener('click', function() {
                editTask(task);
            });

            const checkbox = taskItem.querySelector('input[type="checkbox"]');
            checkbox.addEventListener('change', function() {
                toggleTaskCompletion(task.id);
            });

            const importantBtn = taskItem.querySelector('.important-btn');
            importantBtn.addEventListener('click', function() {
                toggleTaskImportance(task.id);
            });
        });
    }

    function deleteTask(taskId) {
        tasks = tasks.filter(task => task.id !== taskId);
        renderTasks();
    }

    function editTask(task) {
        const newTaskName = prompt('Edit Task:', task.name);
        if (newTaskName !== null) {
            task.name = newTaskName.trim();
            renderTasks();
        }
    }

    function toggleTaskCompletion(taskId) {
        const taskIndex = tasks.findIndex(task => task.id === taskId);
        if (taskIndex !== -1) {
            tasks[taskIndex].completed = !tasks[taskIndex].completed;
            renderTasks();
        }
    }

    function toggleTaskImportance(taskId) {
        const taskIndex = tasks.findIndex(task => task.id === taskId);
        if (taskIndex !== -1) {
            tasks[taskIndex].important = !tasks[taskIndex].important;
            renderTasks();
        }
    }

    allTasksLink.addEventListener('click', function(e) {
        e.preventDefault();
        renderTasks();
    });

    completedTasksLink.addEventListener('click', function(e) {
        e.preventDefault();
        const completedTasks = tasks.filter(task => task.completed);
        renderFilteredTasks(completedTasks);
    });

    incompleteTasksLink.addEventListener('click', function(e) {
        e.preventDefault();
        const incompleteTasks = tasks.filter(task => !task.completed);
        renderFilteredTasks(incompleteTasks);
    });

    function renderFilteredTasks(filteredTasks) {
        taskList.innerHTML = '';
        filteredTasks.forEach(function(task) {
            const taskItem = document.createElement('li');
            taskItem.className = 'task-item';
            if (task.completed) {
                taskItem.classList.add('completed');
            }
            if (task.important) {
                taskItem.classList.add('important');
            }
            taskItem.innerHTML = `
                <input type="checkbox" ${task.completed ? 'checked' : ''}>
                <span>${task.name}</span>
                <button class="edit-btn">Edit</button>
                <button class="delete-btn">Delete</button>
                <button class="important-btn">${task.important ? 'Unmark Important' : 'Mark Important'}</button>
            `;
            taskList.appendChild(taskItem);

            const deleteBtn = taskItem.querySelector('.delete-btn');
            deleteBtn.addEventListener('click', function() {
                deleteTask(task.id);
            });

            const editBtn = taskItem.querySelector('.edit-btn');
            editBtn.addEventListener('click', function() {
                editTask(task);
            });

            const checkbox = taskItem.querySelector('input[type="checkbox"]');
            checkbox.addEventListener('change', function() {
                toggleTaskCompletion(task.id);
            });

            const importantBtn = taskItem.querySelector('.important-btn');
            importantBtn.addEventListener('click', function() {
                toggleTaskImportance(task.id);
            });
        });
    }
});
