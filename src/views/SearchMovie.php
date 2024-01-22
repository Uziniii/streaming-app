<!-- SearchMovie.php -->

<?php
include(VIEWS . "Header.php");

require_once("../vendor/autoload.php");
require_once("../src/config/config.php");
// require(__DIR__ . '/../../tmdb_v3-PHP-API--master/tmdb-api.php');

// $tmdb = new TMDB();
// Assurez-vous que le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Vérifiez si le champ search_query est défini dans la requête
    if (isset($_GET['search_query'])) {
        // Récupérez la valeur du champ search_query
        $searchQuery = $_GET['search_query'];

        echo ' <div class="verticalCardRow"> ';
    
        foreach ($searchResults as $movie) {
            echo '<form action="" method="post">';
        // echo '<input class="directorName" type="hidden" value="'. $directorName . '"/>';
        // echo '<input class="cast" type="hidden" value"' . $movie->getCast() . '"/>';
        echo '<input  id="magnet-' . $movie->getID() . '" type="hidden" value="' . htmlspecialchars('/download?name=' . $movie->getTitle()) . '" />';
        echo '<input  id="movieDetails-' . $movie->getID() . '" type="hidden" value="' . htmlspecialchars($movie->getJSON()) . '">';
        echo '<article class="verticalCard" data-movie-id="' . $movie->getID() . '">';
        echo '<div class="verticalCardImage" style="background-image: url(\'https://image.tmdb.org/t/p/w780/' . basename($movie->getPoster()) . '\');"></div>';
        echo '<h3 class="verticalCardTitle">' . $movie->getTitle() . '</h3>';
        echo '<div class="verticalCardDate">' . $movie->getReleaseDate() . '</div>';
        echo '</article>';
        echo '</form>';
            // echo '          <li>'. $movie->getTitle() .' (<a href="https://www.themoviedb.org/movie/'. $movie->getID() .'">'. $movie->getID() .'</a>)</li>';
            // echo '<div class="verticalCardImage" style="background-image: url(\'https://image.tmdb.org/t/p/w780/' . basename($movie->getPoster()) . '\');"></div>';
            
        }
    
        echo '</div>';
    } 
}
include VIEWS . "MovieModal.php";
include(VIEWS . "Footer.php");
?>
