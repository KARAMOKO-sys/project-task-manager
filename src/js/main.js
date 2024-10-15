// js/main.js

function navigateTo(controller) {
    window.location.href = '/project-task-manager/src/controller/view-dashboard/' + controller + '.php';
}

// Assurez-vous que la fonction est disponible globalement
window.navigateTo = navigateTo;
