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
        <form action="" method="post">
            <input id="magnet-10378" type="hidden" value="/download?name=">
            <input id="movieDetails-10378" type="hidden" value="<?= htmlspecialchars($tmdb->getMovie(10378)->getJSON()) ?>">
            <article class="verticalCard" data-movie-id="10378">
                <div class="verticalCardImage" style="background-image: url('https://image.tmdb.org/t/p/w780/i9jJzvoXET4D9pOkoEwncSdNNER.jpg');"></div>
                <h3 class="verticalCardTitle">Big Buck Bunny</h3>
                <div class="verticalCardDate">2008-05-30</div>
            </article>
        </form>
        <?php

        $movies = $tmdb->getTopRatedMovies();
        foreach ($movies as $movie) {
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
        include VIEWS . "MovieModal.php";
        ?>



    </div>

    <div class="trendingCategory">
    <div class="categoryTitleContainer">
        <img src="/img/icons8-flame-48.png" alt="" class="trendingCategoryLogo categoryLogo">
        <h2 class="trendingCategoryTitle categoryTitle">
            GOAT
        </h2>
    </div>
    <div class="verticalCardRow">
        <form action="" method="post">
            <input id="magnet-10378" type="hidden" value="/download?name=">
            <input id="movieDetails-10378" type="hidden" value="<?= htmlspecialchars($tmdb->getMovie(10378)->getJSON()) ?>">
            <article class="verticalCard" data-movie-id="10378">
                <div class="verticalCardImage" style="background-image: url('https://image.tmdb.org/t/p/w780/i9jJzvoXET4D9pOkoEwncSdNNER.jpg');"></div>
                <h3 class="verticalCardTitle">Big Buck Bunny</h3>
                <div class="verticalCardDate">2008-05-30</div>
            </article>
        </form>
        <?php

        $movies = $tmdb->getPopularMovies();
        foreach ($movies as $movie) {
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
        include VIEWS . "MovieModal.php";
        ?>



    </div>

    <div class="trendingCategory">
    <div class="categoryTitleContainer">
        <img src="/img/icons8-flame-48.png" alt="" class="trendingCategoryLogo categoryLogo">
        <h2 class="trendingCategoryTitle categoryTitle">
            GOAT
        </h2>
    </div>
    <div class="verticalCardRow">
        <form action="" method="post">
            <input id="magnet-10378" type="hidden" value="/download?name=">
            <input id="movieDetails-10378" type="hidden" value="<?= htmlspecialchars($tmdb->getMovie(10378)->getJSON()) ?>">
            <article class="verticalCard" data-movie-id="10378">
                <div class="verticalCardImage" style="background-image: url('https://image.tmdb.org/t/p/w780/i9jJzvoXET4D9pOkoEwncSdNNER.jpg');"></div>
                <h3 class="verticalCardTitle">Big Buck Bunny</h3>
                <div class="verticalCardDate">2008-05-30</div>
            </article>
        </form>
        <?php

        $movies = $tmdb->getNowPlayingMovies();
        foreach ($movies as $movie) {
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
        include VIEWS . "MovieModal.php";
        ?>



    </div>
    
</div>