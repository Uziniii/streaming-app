// Ajoute un écouteur d'événements pour détecter le défilement de la fenêtre
window.addEventListener('scroll', function() {
    var header = document.querySelector('header');

    // Ajoute ou supprime une classe en fonction de la position du défilement
    if (window.scrollY > 0) {
        header.classList.add('headerActive');
    } else {
        header.classList.remove('headerActive');
    }
});

let header = document.querySelector('header');
let menuBurgerBtn = document.querySelector('.menuBurgerBtn');
let menuBurgerIcon = document.querySelector('.menuBurgerIcon');
let nav = document.querySelector('.nav');

menuBurgerBtn.addEventListener('click', function (e) {
    e.stopPropagation(); // Prevent the click event from reaching the document body
    header.classList.toggle('menuActive');
    nav.classList.toggle('navActive');
    menuBurgerBtn.classList.toggle('menuBurgerActive');
});
menuBurgerBtn.addEventListener('mouseenter', function (e) {
    e.stopPropagation(); // Prevent the click event from reaching the document body
    header.classList.toggle('menuActive');
    nav.classList.toggle('navActive');
    menuBurgerBtn.classList.toggle('menuBurgerActive');
});

document.body.addEventListener('click', function (e) {
    if (!menuBurgerBtn.contains(e.target) && !nav.contains(e.target)) {
        // Clicked outside menuBurgerBtn and nav, close the navigation
        header.classList.remove('menuActive');
        nav.classList.remove('navActive');
        menuBurgerBtn.classList.remove('menuBurgerActive');     
    }
});




// Définit une liste d'ID de genre pour les films
let genreId = [
    { id: 28, name: "Action" },
    { id: 12, name: "Adventure" },
    { id: 16, name: "Animation" },
    { id: 35, name: "Comedy" },
    { id: 80, name: "Crime" },
    { id: 99, name: "Documentary" },
    { id: 18, name: "Drama" },
    { id: 10751, name: "Family" },
    { id: 14, name: "Fantasy" },
    { id: 36, name: "History" },
    { id: 27, name: "Horror" },
    { id: 10402, name: "Music" },
    { id: 9648, name: "Mystery" },
    { id: 10749, name: "Romance" },
    { id: 878, name: "Science Fiction" },
    { id: 10770, name: "TV Movie" },
    { id: 53, name: "Thriller" },
    { id: 10752, name: "War" },
    { id: 37, name: "Western" },
];      

const container = document.querySelector('.movieCaroussel');

// Fonction pour récupérer les données depuis l'API
async function fetchData(params1, params2, params3) {
    const url = `https://api.themoviedb.org/3/${params1}/${params2}?language=en-US&page=${params3}`;

    const options = {
        headers: {
            Authorization:
                'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI0MTNiOTgwMzE3NmI5NTExZjA3ZGY1NzFjYmIyZTExYyIsInN1YiI6IjY1MWE3ZTkzNzQ1MDdkMDBhYzQ1YTcyYSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.lvQzfTlCAIKJm4kqboCq72whanlxjUJPzrAjP1rWaoY',
            accept: 'application/json',
        },
    };

    const response = await fetch(url, options);
    const data = await response.json();

    // Use Promise.all to wait for all fetches to complete
    const mappedDataPromises = data.results.map(async (e) => {
        const creditsResponse = await fetch(`https://api.themoviedb.org/3/movie/${e.id}/credits?api_key=413b9803176b9511f07df571cbb2e11c`);
        const creditsData = await creditsResponse.json();

        const director = creditsData.crew.find(({ job }) => job === 'Director');
        const directorName = director ? director.name : 'Unknown';

        return {
            title: e.title,
            posterPath: `https://image.tmdb.org/t/p/w1280${e.poster_path}`,
            vote_average: e.vote_average,
            vote_count: e.vote_count,
            popularity: e.popularity,
            overview: e.overview,
            genre_ids: genreId.find((genre) => genre.id === e.genre_ids[0])?.name,
            id: e.id,
            release_date: e.release_date,
            backdrop_path: `https://image.tmdb.org/t/p/w1280${e.backdrop_path}`,
            director: directorName,
        };
    });

    // Wait for all promises to resolve
    const mappedData = await Promise.all(mappedDataPromises);

    // Log les données mappées
    console.log(mappedData);

    // Retourne les données mappées
    return mappedData;
}

let banner = document.getElementsByClassName('banner');
let bannerDesc = document.getElementsByClassName('bannerMovieDesc');
let bannerTitle = document.getElementsByClassName('bannerMovieTitle');
let categoryMovieTitle = document.querySelectorAll('.categoryMovieTitle');
let categoryDate = document.querySelectorAll('.categoryDate');
let categoryMovieImage = document.querySelectorAll('.categoryMovieImage');
let currentIndex = 0;

let movies;
fetchData('movie', 'popular', '1')
    .then((data)=> {
        movies = data;

        data.slice(0, 6).forEach((movie, index)=> {
            let { backdrop_path, title, release_date } = movie;

            // Set background image for categoryMovieImage
            categoryMovieImage[index].style.backgroundImage = `url(https://image.tmdb.org/t/p/w1280${backdrop_path})`;

            // Set title
            categoryMovieTitle[index].innerText = title;

            // Set release date
            categoryDate[index].innerText = release_date;
        });
    })
    .catch((error) => {
        console.error('Error fetching data:', error);
    })






// Fonction pour mettre à jour le banner avec les données du film
function updateBanner(movie) {
    setTimeout(() => {
        banner[0].classList.remove('startBannerAnimation');
        bannerTitle[0].classList.remove('starBannerAnimation');
        bannerDesc[0].classList.remove('starBannerAnimation');
    }, 500);
    banner[0].classList.add('startBannerAnimation');
    bannerTitle[0].classList.add('starBannerAnimation');
    bannerDesc[0].classList.add('starBannerAnimation');
    // Set the background image of the banner
    banner[0].style.backgroundImage = `url(https://image.tmdb.org/t/p/w1280/${movie.backdrop_path})`;

    // Fetch additional data for movie credits to get the director's name
    fetch(`https://api.themoviedb.org/3/movie/${movie.id}/credits?api_key=413b9803176b9511f07df571cbb2e11c`)
        .then(response => response.json())
        .then((jsonData) => {
            // Filter the crew to get the director's name
            const director = jsonData.crew.find(({ job }) => job === 'Director');
            const directorName = director ? director.name : 'Unknown';

            // Update the title and description in the banner
            
            bannerTitle[0].innerText = movie.title; // Use the passed movie parameter
            bannerDesc[0].innerText = `Directed by ${directorName || 'Unknown'}`;
            
            
        });
}

function handleHover(index) {
    if (movies && movies.length > 0) {
        const movie = movies[(currentIndex + index) % movies.length];
        updateBanner(movie);
    }
}


// Sélectionne le conteneur des cartes horizontales

// Appelle la fonction fetchData avec les paramètres spécifiés
fetchData("movie", "top_rated", "5")
    .then((data) => {
        // Stocke les données des films dans la variable movies
        movies = data;
        // Crée des éléments d'article pour les cartes horizontales
        data.slice(0, 4).forEach((movie, index) => {
            const article = document.createElement('article');
            article.classList.add('horizontalCard');
            article.style.backgroundImage = `url(https://image.tmdb.org/t/p/w780/${movie.backdrop_path})`;

            const titleElement = document.createElement('h3');
            titleElement.classList.add('horizontalCardTitle');
            titleElement.textContent = movie.title;

            article.appendChild(titleElement);
            container.appendChild(article);

            // Ajoute un écouteur d'événements 'mouseenter' à chaque carte horizontale
            article.addEventListener('mouseenter', () => handleHover(index));
        });

        // Initial setup
        updateBanner(movies[currentIndex % movies.length]);
    })
    .catch((error) => {
        console.error('Error fetching data:', error);
    });


// Log les données des films
console.log("movies", movies);
