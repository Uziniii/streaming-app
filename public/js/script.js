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
    const modalReleaseDate = document.querySelector(".modalReleaseDate");
    const modalBackdrop = document.querySelector('.modalBackdrop');

    aMagnet.href = magnet;
    modalTitle.textContent = movieDetails.title;
    modalReleaseDate.textContent = "" + movieDetails.release_date + "";
    // modalBackdrop.style.backgroundImage = "url(" + movieDetails.backdrop_path + ")"
    
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
