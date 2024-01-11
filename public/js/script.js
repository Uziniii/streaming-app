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
        console.log('test');
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

// Add a click event listener to the "Close" button
closeButton.addEventListener("click", () => {
    console.log('test');
    body.classList.remove('modalScroll');
    dialog.close();
});

// Function to open the dialog for a specific movie
function openDialog(movieId) {
    // Customize this part based on how you retrieve movie details
    // For now, it just shows the movie ID in the dialog

    // Assuming you have a hidden input for movie details
    const magnet = document.getElementById("magnet-" + movieId).value;
    const movieDetailsJson = document.getElementById("movieDetails-" + movieId).value;
    const movieDetails = JSON.parse(movieDetailsJson);

    // Update modal title and release date
    const aMagnet = document.getElementById("magnet");
    const modalTitle = document.querySelector(".modalBannerTitle");
    const modalBannerDesc = document.querySelector(".modalBannerDesc")
    const modalBackdrop = document.querySelector('.modalBackdrop');

    const modalDescription = document.querySelector('.modalDescription');

    const modalReleaseDate = document.querySelector(".modalReleaseDate");
    const modalLength = document.querySelector('.modalLength');
    const modalBudget = document.querySelector('.modalBudget');
    const modalRating = document.querySelector('.modalRating');

    aMagnet.href = magnet;
    modalTitle.textContent = movieDetails.title;
    modalReleaseDate.textContent = "" + movieDetails.release_date + "";
    modalBannerDesc.textContent = "" + movieDetails.director + "";
    modalDescription.textContent = "" + movieDetails.overview + "";
    modalBudget.textContent = "" + movieDetails.budget + "";
    modalRating.textContent = "" + movieDetails.rating + "";
    modalLength.textContent = "" + movieDetails.runtime + "";


    
    
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
