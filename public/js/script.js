// HEADER REGION 

let header = document.querySelector('header');

window.addEventListener('scroll', function() {
    var header = document.querySelector('header');

    // Ajoute ou supprime une classe en fonction de la position du défilement
    if (window.scrollY > 0) {
        header.classList.add('headerActive');
    } else {
        header.classList.remove('headerActive');
    }
});

let menuBurgerBtn = document.querySelector('.menuBurgerBtn');
let menuBurgerIcon = document.querySelector('.menuBurgerIcon');
let nav = document.querySelector('.nav');

menuBurgerBtn.addEventListener('click', function (e) {
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

// HEADER REGION ENDS 

const container = document.querySelector(".movieCaroussel");
const trendingContainer = document.getElementById("trendingContainer");
const banner = document.querySelector(".bannerContainer");
const body = document.querySelector("body");

// Select all buttons that open the dialog
const showButtons = document.querySelectorAll(".verticalCard");

// Select the dialog and close button
const dialog = document.querySelector("dialog");
const closeButton = document.querySelector("dialog button");

dialog.requestFullscreen();

// Add a click event listener to each "Show" button
showButtons.forEach(element => {
    element.addEventListener("click", () => {
        // Get the movie ID or other identifier from the clicked card
        const movieId = element.dataset.movieId;
        // Open the dialog for the specific movie
        body.classList.add('modalScroll');
        openDialog(movieId);
    });
});

function modalNoScroll () { //AVOIDS SCROLING WHEN THE MODAL IS OPENED
    const scrollY = document.body.style.top;
    document.body.style.position = '';
    document.body.style.top = '';
    window.scrollTo(0, parseInt(scrollY || '0') * -1);
}

modalNoScroll();

closeButton.addEventListener("click", () => {
    body.classList.remove('modalScroll');
    dialog.close();
});




const genreId = [  //ALL THE GENRE
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


// Function to open the dialog for a specific movie
function openDialog(movieId) {

    const magnet = document.getElementById("magnet-" + movieId).value;
    let details = JSON.parse(document.querySelector('#movieDetails-' + movieId).value);
    const castName = document.querySelectorAll('.castName').value;
    const castImage = document.querySelectorAll('.castImage').value;
    // let directorName = document.querySelector('.directorName').value;

    const aMagnet = document.getElementById("magnet");
    const title = document.querySelector('.modalBannerTitle');
    // const director = document.querySelector('.modalBannerDesc');
    const overview = document.querySelector('.modalDescription');
    const rating = document.querySelector('.modalRating');
    const release = document.querySelector('.modalReleaseDate');
    const budget = document.querySelector('.modalBudget');
    const genreContainer = document.querySelector('.modalGenreContainer');
    const banner = document.querySelector('.modalBanner');
    const modalCastName = document.querySelectorAll('.modalCastName');
    const modalCastImage = documetn.querySelectorAll('.modalCastImg');
    
    modalCastImage.forEach((image) => {
        castImage.forEach((castImage) => {
            image.style.backgroundImage = 'url('+ castImage +')';
        })
    })

    modalCastName.forEach((name) => {
        castName.forEach((castName) => {
            name.textContent = castName;
        })
    })

    genreContainer.innerHTML = "";

    // SHOW THE GENRE OF THE MOVIE
    details.genre_ids.forEach((individualGenreId) => {
        let genreObj = genreId.find((genre) => genre.id === individualGenreId);

        if (genreObj) {
            let modalGenreDiv = document.createElement("div");
            modalGenreDiv.classList.add("modalGenre");
            let modalGenreNameParagraph = document.createElement("p");
            modalGenreNameParagraph.classList.add("modalGenreName");
            
            modalGenreNameParagraph.textContent = genreObj.name ;
    
            modalGenreDiv.appendChild(modalGenreNameParagraph);
    
            // Append the modalGenre div to the parent element
            genreContainer.appendChild(modalGenreDiv);
        }
    })

    // director.textContent = directorName;
    banner.style.backgroundImage = 'url(https://image.tmdb.org/t/p/original/' + details.backdrop_path + ')';
    rating.textContent = details.adult ? "PG" : "18+";
    title.textContent = details.title;
    overview.textContent = details.overview;
    release.textContent = details.release_date;
    budget.textContent = details.budget;


    aMagnet.href = magnet;

    dialog.showModal();

}

// Function to close the modal by ID
function closeModal(modalId) {
    var modal = document.getElementById(modalId);
    if (modal) {
        modal.close();
    } else {
        console.error('Modal not found with ID: ' + modalId);
    }
}
