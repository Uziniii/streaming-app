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

        echo '<div class="resultCard">';
        echo ' <div class="verticalCardRow"> ';
    
        foreach ($searchResults as $movie) {
            $thisMovie = $tmdb->getMovie($movie->getID());
            $cast = $thisMovie->getCast();
            $castLimit = min(5, count($cast));

            $directorId = $thisMovie->getDirectorIds();
            $directorLimit = min(1, count($directorId));

            $posterPath = $movie->getPoster();

            echo '<form action="" method="post">';

            foreach (array_slice($cast, 0, $castLimit) as $index => $person) {
                    echo '<input type="hidden" class="castName movie-' . $movie->getID() . '" value="' . $person->getName() . '" />';
                    echo '<input type="hidden" class="castImage movie-' . $movie->getID() . '" value="' . $tmdb->getImageURL('w185') . $person->getProfile() . '" />';
            }

            foreach (array_slice($directorId, 0, $directorLimit) as $index => $directorId) {
                $director = $tmdb->getPerson($directorId);
                echo '<input type="hidden" class="directorName movie-' . $movie->getID() . '" value="' . $director->getName() . '" />';
            }
            echo '<input id="magnet-' . $movie->getID() . '" type="hidden" value="' . htmlspecialchars('/download?name=' . $movie->getTitle()) . '" />';
            echo '<input id="movieDetails-' . $movie->getID() . '" type="hidden" value="' . htmlspecialchars($movie->getJSON()) . '">';
            echo '<article class="verticalCard" data-movie-id="' . $movie->getID() . '">';
            if (!empty($posterPath)) {
                echo '<div class="verticalCardImage" style="background-image: url(\'https://image.tmdb.org/t/p/w780/' . basename($posterPath) . '\');"></div>';
            } else {
                // Provide a default image or placeholder if the poster path is empty
                echo '<div class="verticalCardImage" style="background-image: url(\'../img/no_image_found_default.png\');"></div>';
            }
            echo '<h3 class="verticalCardTitle">' . $movie->getTitle() . '</h3>';
            echo '<div class="verticalCardDate">' . $movie->getReleaseDate() . '</div>';
            echo '</article>';
            echo '</form>';
                
            unset($thisMovie);
        }
    
        echo '</div>';
        echo '</div>';
    } 
}
include VIEWS . "MovieModal.php";
include(VIEWS . "Footer.php");
?>
