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
        $posterPath = $movie->getPoster();
        echo '<form action="" method="post">';
        $cast = $movie->getCast();
        foreach ($cast as $index => $person) {
            if ($index < 3) {
                echo '<input class="castName" type="hidden" value="' . $person->getName() . '"/>';
                echo '<input class="castImage" type="hidden" value="' . $person->getImageURL('w185') . '"/>';
            } else {
                break;
            }
        }
        echo '<input  id="magnet-' . $movie->getID() . '" type="hidden" value="' . htmlspecialchars('/download?name=' . $movie->getTitle()) . '" />';
        echo '<input  id="movieDetails-' . $movie->getID() . '" type="hidden" value="' . htmlspecialchars($movie->getJSON()) . '">';
        echo '<article class="verticalCard" data-movie-id="' . $movie->getID() . '">';
        $posterPath = $movie->getPoster();
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
    }

        ?>
   
        

    </div>
    <?php 
        include VIEWS . "MovieModal.php";
    ?>
</div>
<div class="trendingCategory">
    <div class="categoryTitleContainer">
        <img src="/img/icons8-flame-48.png" alt="" class="trendingCategoryLogo categoryLogo">
        <h2 class="trendingCategoryTitle categoryTitle">
            NOW IN THEATER
        </h2>
    </div>
    <div class="verticalCardRow">
        <?php

    $movies = $tmdb->getNowPlayingMovies();
    foreach($movies as $movie){
        
        echo '<form action="" method="post">';
        $cast = $movie->getCast();
        foreach ($cast as $index => $person) {
            if ($index < 3) {
                echo '<input type="hidden" value="' . $person->getName() . '"/>';
                echo '<input type="hidden" value="' . $person->getImageURL('w185') . '"/>';
            } else {
                break;
            }
        }
        echo '<input  id="magnet-' . $movie->getID() . '" type="hidden" value="' . htmlspecialchars('/download?name=' . $movie->getTitle()) . '" />';
        echo '<input  id="movieDetails-' . $movie->getID() . '" type="hidden" value="' . htmlspecialchars($movie->getJSON()) . '">';
        echo '<article class="verticalCard" data-movie-id="' . $movie->getID() . '">';
        $posterPath = $movie->getPoster();
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
    }

        ?>
   
        

    </div>
    <?php 
        include VIEWS . "MovieModal.php";
    ?>
</div>
<div class="trendingCategory">
    <div class="categoryTitleContainer">
        <img src="/img/icons8-flame-48.png" alt="" class="trendingCategoryLogo categoryLogo">
        <h2 class="trendingCategoryTitle categoryTitle">
            POPULAR
        </h2>
    </div>
    <div class="verticalCardRow">
        <?php

    $movies = $tmdb->getPopularMovies();
    foreach($movies as $movie){
        echo '<form action="" method="post">';
        $cast = $movie->getCast();
        foreach ($cast as $index => $person) {
            if ($index < 3) {
                echo '<input type="hidden" value="' . $person->getName() . '"/>';
                echo '<input type="hidden" value="' . $person->getImageURL('w185') . '"/>';
            } else {
                break;
            }
        }
        echo '<input  id="magnet-' . $movie->getID() . '" type="hidden" value="' . htmlspecialchars('/download?name=' . $movie->getTitle()) . '" />';
        echo '<input  id="movieDetails-' . $movie->getID() . '" type="hidden" value="' . htmlspecialchars($movie->getJSON()) . '">';
        echo '<article class="verticalCard" data-movie-id="' . $movie->getID() . '">';
        $posterPath = $movie->getPoster();
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
    }

        ?>
   
        

    </div>
    <?php 
        include VIEWS . "MovieModal.php";
    ?>
</div>