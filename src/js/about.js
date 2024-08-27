// Les données de l'équipe

let BASE_URL = "/project-task-manager/src/";

const teamMembers = [
    {
        name: "Jean Dupont",
        role: "CEO & Fondateur",
        description: "Jean est le fondateur de Task Manager, avec une passion pour l'innovation et l'efficacité dans la gestion des tâches.",
        email: "jean.dupont@example.com",
        image: `${BASE_URL}/assets/images/image_31.jpg`,
    },
    {
        name: "Marie Curie",
        role: "CTO & Co-Fondatrice",
        description: "Marie est notre CTO, assurant que notre technologie est à la pointe et répond aux besoins de nos utilisateurs.",
        email: "marie.curie@example.com",
        image: `${BASE_URL}/assets/images/image_22.jpg`,
    },
    {
        name: "Albert Einstein",
        role: "Lead Developer",
        description: "Albert est notre Lead Developer, travaillant sur les fonctionnalités et améliorations continues de notre produit.",
        email: "albert.einstein@example.com",
        image: `${BASE_URL}/assets/images/image_30.jpg`,
    }
];

function generateTeamSection() {
    const section = document.createElement('div');
    section.className = 'about-section';

    const title = document.createElement('h1');
    title.className = 'section-title text-center';
    title.textContent = 'Notre Équipe';
    section.appendChild(title);

    const row = document.createElement('div');
    row.className = 'row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mb-5';

    teamMembers.forEach(member => {
        const col = document.createElement('div');
        col.className = 'col';

        const card = document.createElement('div');
        card.className = 'team-card text-center p-4';

        const img = document.createElement('img');
        img.src = member.image;
        img.alt = member.name;

        const name = document.createElement('h4');
        name.textContent = member.name;

        const role = document.createElement('p');
        role.textContent = member.role;

        const description = document.createElement('p');
        description.textContent = member.description;

        const contactLink = document.createElement('a');
        contactLink.href = `mailto:${member.email}`;
        contactLink.className = 'btn btn-primary';

        const icon = document.createElement('i');
        icon.className = 'fas fa-envelope me-2';

        contactLink.appendChild(icon);
        contactLink.appendChild(document.createTextNode(' Contacter'));

        card.appendChild(img);
        card.appendChild(name);
        card.appendChild(role);
        card.appendChild(description);
        card.appendChild(contactLink);

        col.appendChild(card);
        row.appendChild(col);
    });

    section.appendChild(row);

    return section;
}

// Append the generated section to an existing container
document.getElementById('team-container').appendChild(generateTeamSection());


//Stockage de texte.


const divOne = document.getElementById('divOne');
divOne.textContent = "Nous sommes une équipe passionnée par la gestion des tâches et des projets. Notre mission est de simplifier votre vie"
                    + "en vous offrant des outils puissants pour organiser votre travail.";
