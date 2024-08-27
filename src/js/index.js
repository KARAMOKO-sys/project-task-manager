//index.js

let BASE_URL = "/project-task-manager/src/";

//Carousel.js
document.addEventListener('DOMContentLoaded', function () {
    const carouselData = [
    {
        src: `${BASE_URL}/assets/images/image_1.jpg`,
        title: "TASK MANAGER",
        text: "Gérer ses projets est devenu un jeu d’enfant !",
        active: true
    },
    {
        src: `${BASE_URL}/assets/images/image_2.jpg`,
        title: "TASK MANAGER",
        text: "Organisez vos tâches efficacement.",
        active: false
    },
    {
        src: `${BASE_URL}/assets/images/image_3.jpg`,
        title: "TASK MANAGER",
        text: "Boostez votre productivité dès aujourd’hui.",
        active: false
    }
    ];
    
        const indicatorsContainer = document.querySelector('.carousel-indicators');
        const innerContainer = document.querySelector('.carousel-inner');
    
        carouselData.forEach((item, index) => {
        // Create indicator button
        const indicator = document.createElement('button');
        indicator.type = 'button';
        indicator.dataset.bsTarget = '#carouselExampleDark';
        indicator.dataset.bsSlideTo = index;
        indicator.ariaLabel = `Slide ${index + 1}`;
        if (item.active) {
            indicator.classList.add('active');
            indicator.ariaCurrent = 'true';
            indicator.ariaCurrent = 'true';
        }
        indicatorsContainer.appendChild(indicator);
    
        // Create carousel item
        const carouselItem = document.createElement('div');
        carouselItem.classList.add('carousel-item');
        if (item.active) {
            carouselItem.classList.add('active');
        }
        const img = document.createElement('img');
        img.src = item.src;
        img.classList.add('d-block', 'w-100');
        img.alt = '...';
        const caption = document.createElement('div');
        caption.classList.add('carousel-caption', 'd-none', 'd-md-block', 'text-white');
        const h1 = document.createElement('h1');
        h1.textContent = item.title;
        const p = document.createElement('p');
        p.textContent = item.text;
        caption.appendChild(h1);
        caption.appendChild(p);
        carouselItem.appendChild(img);
        carouselItem.appendChild(caption);
        innerContainer.appendChild(carouselItem);
    });
});
    


//Card.js
const cards = [
    {
        img: `${BASE_URL}assets/images/image_6.jpg`,
        title: "Planification",
        text: "Planifiez vos tâches et projets avec notre interface intuitive."
    },
    {
        img: `${BASE_URL}assets/images/image_19.jpg`,
        title: "Suivi",
        text: "Suivez l'avancement de vos tâches et projets en temps réel."
    },
    {
        img: `${BASE_URL}assets/images/image_12.jpg`,
        title: "Collaboration",
        text: "Collaborez efficacement avec votre équipe en temps réel également."
    },
    {
        img: `${BASE_URL}assets/images/image_18.jpg`,
        title: "Gestion de Projet",
        text: "Organisez et gérez vos projets facilement."
    },
    {
        img: `${BASE_URL}assets/images/image_13.jpg`,
        title: "Analyse",
        text: "Analysez les performances de votre équipe."
    },
    {
        img: `${BASE_URL}assets/images/image_10.jpg`,
        title: "Etapes",
        text: "Structure vos projets par étape."
    }
];

let currentPage = 1;
const itemsPerPage = 3;

function displayCards(page) {
    const startIndex = (page - 1) * itemsPerPage;
    const endIndex = page * itemsPerPage;
    const cardContainer = document.getElementById('card-container');
    cardContainer.innerHTML = '';

    for (let i = startIndex; i < endIndex && i < cards.length; i++) {
        const card = cards[i];
        const cardHtml = `
            <div class="col">
                <div class="card h-100">
                    <img src="${card.img}" class="card-img-top" alt="${card.title}">
                    <div class="card-body">
                        <h5 class="card-title">${card.title}</h5>
                        <p class="card-text">${card.text}</p>
                        <a href="#" class="btn btn-primary">En savoir plus</a>
                    </div>
                </div>
            </div>
        `;
        cardContainer.insertAdjacentHTML('beforeend', cardHtml);
    }
}

document.getElementById('prev-page').addEventListener('click', function(event) {
    event.preventDefault();
    if (currentPage > 1) {
        currentPage--;
        displayCards(currentPage);
    }
});

document.getElementById('next-page').addEventListener('click', function(event) {
    event.preventDefault();
    if (currentPage * itemsPerPage < cards.length) {
        currentPage++;
        displayCards(currentPage);
    }
});
// Initial display
displayCards(currentPage);

//Témoignage
document.addEventListener('DOMContentLoaded', function () {
    const testimonials = [
        {
            imgSrc: `${BASE_URL}assets/images/image_23.jpg`,
            altText: "Portrait de Jean Dupont",
            quote: "Task Manager a révolutionné la façon dont nous gérons nos projets. L'interface est simple et efficace. Je recommande vivement !",
            name: "Jean Dupont"
        },
        {
            imgSrc: `${BASE_URL}assets/images/image_24.jpg`,
            altText: "Portrait de Marie Curie",
            quote: "Une application indispensable pour tous ceux qui cherchent à améliorer leur productivité. Bravo à l'équipe de développement !",
            name: "Marie Curie"
        }
    ];

    const testimonialsContainer = document.getElementById('testimonialsContainer');

    if (testimonialsContainer) {
        testimonials.forEach(testimonial => {
            const colDiv = document.createElement('div');
            colDiv.classList.add('col-md-6');

            const testimonialDiv = document.createElement('div');
            testimonialDiv.classList.add('testimonial');

            const ratioDiv = document.createElement('div');
            ratioDiv.classList.add('ratio', 'ratio-1x1', 'mb-3');

            const img = document.createElement('img');
            img.src = testimonial.imgSrc;
            img.alt = testimonial.altText;
            img.classList.add('img-fluid', 'object-fit-cover');

            ratioDiv.appendChild(img);

            const p = document.createElement('blockquote');
            p.textContent = `"${testimonial.quote}"`;

            const h5 = document.createElement('h5');
            h5.textContent = `- ${testimonial.name}`;

            testimonialDiv.appendChild(ratioDiv);
            testimonialDiv.appendChild(p);
            testimonialDiv.appendChild(h5);
            colDiv.appendChild(testimonialDiv);
            testimonialsContainer.appendChild(colDiv);
        });
    }
});
