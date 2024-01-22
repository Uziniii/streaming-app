<?php
// Assuming you have already included necessary files and initialized constants
require_once("../vendor/autoload.php");
require_once("../src/config/config.php");
require(__DIR__ . '/../../tmdb_v3-PHP-API--master/tmdb-api.php');

$tmdb = new TMDB();



?>
<div class="trendingCategory">
    <div class="categoryTitleContainer">
        <img src="/img/icons8-flame-48.png" alt="" class="trendingCategoryLogo categoryLogo">
        <h2 class="trendingCategoryTitle categoryTitle">
            GOAT
        </h2>
    </div>
    <div class="verticalCardRow">
        <?php

    $movies = $tmdb->getTopRatedMovies();
    foreach($movies as $movie){
        // $crew = $movie->getCrew();
        // $directorName = "";
        // foreach($crew as $person) {
        //     if ($person->getJob() === 'Director') {
        //         $directorName = $person->getName();
        //         break;
        //     }
        // }
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
    }

        ?>
   
        

    </div>
    <?php 
        include VIEWS . "MovieModal.php";
    ?>
</div>