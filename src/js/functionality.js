let BASE_URL = "/project-task-manager/src/";

//Alerte.js

document.addEventListener('DOMContentLoaded', function () {
    const closeAlertButton = document.getElementById('closeAlertButton');
    const alertElement = closeAlertButton.closest('.alert');

    closeAlertButton.addEventListener('click', function () {
        alertElement.classList.remove('show');
        alertElement.classList.add('hide');

        setTimeout(() => {
            alertElement.style.display = 'none';
        }, 150); // Assurez-vous que cette durée correspond à la durée de l'animation de fermeture de Bootstrap
    });
});



const featuresCards = [
    {
        title: "Gestion de Tâches",
        image: `${BASE_URL}/assets/images/image_18.jpg`,
        alt: "Gestion de Tâches",
        description: "Créez, organisez et suivez vos tâches facilement avec notre interface intuitive."
                      + "Vous pouvez attribuer des dates limites, définir des priorités et suivre l'avancement de chaque tâche.",
        link: "#gestion-taches"
    },
    {
        title: "Gestion de Projets",
        image: `${BASE_URL}/assets/images/image_7.jpg`,
        alt: "Gestion de Projets",
        description: "Planifiez et gérez vos projets avec des outils intuitifs. Attribuez des tâches, suivez les progrès et assurez-vous"
                     + "que vos projets respectent les délais, pour pouvoir atteindre les objectifs fixés.",
        link: "#gestion-projets"
    },
    {
        title: "Collaboration",
        image: `${BASE_URL}/assets/images/image_14.jpg`,
        alt: "Collaboration",
        description: "Travaillez en équipe et suivez l’avancement de chacun. Partagez des fichiers,"    
                     + "discutez en temps réel et optimisez la communication pour des projets réussis.",
        link: "#collaboration"
    }
];

function loadFeatures() {
    const featuresContainer = document.getElementById('features-container');

    if (featuresContainer) {
        featuresCards.forEach(feature => {
            const featureDiv = document.createElement('div');
            featureDiv.className = 'col';
            featureDiv.innerHTML = `
                <div class="feature-card">
                    <img src="${feature.image}" class="card-img-top img-fluid" alt="${feature.alt}">
                    <div class="card-body">
                        <h5 class="card-title">${feature.title}</h5>
                        <p class="card-text">${feature.description}</p>
                        <a href="${feature.link}" class="btn btn-primary">En savoir plus</a>
                    </div>
                </div>
            `;
            featuresContainer.appendChild(featureDiv);
        });
    }
}
document.addEventListener('DOMContentLoaded', loadFeatures);

//Accordéion.js
// Données des fonctionnalités avec les icônes et les descriptions
const features = [
    {
        id: 'gestion-taches',
        icon: 'fas fa-tasks',
        title: 'Gestion de Tâches',
        description: 'Notre outil de gestion de tâches vous permet de créer des tâches rapidement,' 
                    + 'de les organiser en fonction de leur priorité, et de suivre leur progression jusqu\'à leur achèvement...'
    },
    {
        id: 'gestion-projets',
        icon: 'fas fa-project-diagram',
        title: 'Gestion de Projets',
        description: 'Avec notre fonctionnalité de gestion de projets, vous pouvez planifier chaque' 
                    + 'étape de vos projets de manière détaillée...'
    },
    {
        id: 'collaboration',
        icon: 'fas fa-users',
        title: 'Collaboration',
        description: 'Notre plateforme facilite la collaboration en équipe en offrant une suite complète'
                    + 'd\'outils conçus pour améliorer la communication et la coordination...'
    },
    {
        id: 'rapports',
        icon: 'fas fa-chart-line',
        title: 'Statistiques',
        description: 'Accédez à des rapports détaillés et à des statistiques avancées pour évaluer la performance'
                    + 'de votre équipe et de vos projets de manière approfondie...'
    },
    {
        id: 'gestion-ressources',
        icon: 'fas fa-cogs',
        title: 'Ressources',
        description: 'Optimisez l’utilisation de vos ressources avec notre outil de gestion des ressources,' 
                    + 'conçu pour allouer efficacement les personnes, les matériaux, et le temps nécessaires...'
    },
    {
        id: 'integration',
        icon: 'fas fa-plug',
        title: 'Intégration',
        description: 'Notre système s\'intègre facilement avec vos outils existants grâce à une large gamme'
                    + 'd\'API et de connecteurs personnalisables...'
    },
    {
        id: 'support-client',
        icon: 'fas fa-headset',
        title: 'Support Client',
        description: 'Notre support client est disponible 24/7 pour vous assister avec tout problème ou question que vous pourriez avoir...'
    }
];

// Sélectionner les éléments du DOM
const featureIconsElement = document.getElementById('featureIcons');
const featureDescriptionElement = document.getElementById('featureDescription');

// Fonction pour générer les icônes
features.forEach((feature) => {
    const iconElement = document.createElement('li');
    iconElement.classList.add('nav-item', 'my-2');
    iconElement.innerHTML = `
        <a href="#" class="nav-link d-flex align-items-center" data-feature-id="${feature.id}">
            <i class="${feature.icon} me-2 fs-4"></i> ${feature.title}
        </a>
    `;
    featureIconsElement.appendChild(iconElement);

    // Ajouter un gestionnaire d'événements pour afficher la description
    iconElement.addEventListener('click', function(event) {
        event.preventDefault();
        featureDescriptionElement.innerHTML = `
            <div class="d-flex align-items-center mb-3">
                <i class="${feature.icon} me-2 fs-4"></i>
                <h3 class="mb-0">${feature.title}</h3>
            </div>
            <p>${feature.description}</p>
        `;
        featureDescriptionElement.style.display = 'block';
    });
    
});