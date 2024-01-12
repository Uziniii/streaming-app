<!-- SearchMovie.php -->

<?php
include(VIEWS . "Header.php");

// Assurez-vous que le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Vérifiez si le champ search_query est défini dans la requête
    if (isset($_GET['search_query'])) {
        // Récupérez la valeur du champ search_query
        $searchQuery = $_GET['search_query'];

        echo '  <div class="panel panel-default">
                    <div class="panel-body">
                        <ul>';
    
        foreach ($searchResults as $movie) {
            echo '          <li>'. $movie->getTitle() .' (<a href="https://www.themoviedb.org/movie/'. $movie->getID() .'">'. $movie->getID() .'</a>)</li>';
        }
    
        echo '          </ul>
                    </div>
                </div>';
    } 
}

include(VIEWS . "Footer.php");
?>
