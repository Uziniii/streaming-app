<?php
// Assuming you have already included necessary files and initialized constants
require_once("../vendor/autoload.php");
require_once("../src/config/config.php");
require(__DIR__ . '/../../tmdb_v3-PHP-API--master/tmdb-api.php');

$tmdb = new TMDB();




	
// if you have no $conf it uses the default config


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
        echo '<form action="" method="post">';
        echo '<input  id="magnet-' . $movie->getID() . '" type="hidden" value="' . htmlspecialchars('/download?magnet=' /** urlencode($this->search($movie->getTitle())) **/) . '" />';
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
    <dialog id="modal">
        <button onclick="closeModal('modal')" autofocus class="modalExit">
            <svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

            <g id="SVGRepo_bgCarrier" stroke-width="0"/>

            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>

            <g id="SVGRepo_iconCarrier"> <path d="M19 5L4.99998 19M5.00001 5L19 19" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </g>

            </svg>
        </button>
        <div class="modalBanner">
            <div class="modalBannerTopContainer">
                <p class="modalBannerDesc">movie description</p>
                <h2 class="modalBannerTitle">Movie title</h2>
            </div>
            <div class="modalBannerGenreBtn">
                <div class="modalGenreContainer">
                    <div class="modalGenre">
                        <p class="modalGenreName">
                            Fantasy
                        </p>
                    </div>
                    <div class="modalGenre">
                        <p class="modalGenreName">
                            Action
                        </p>
                    </div>
                    <div class="modalGenre">
                        <p class="modalGenreName">
                            Adventure
                        </p>
                    </div>
                    <div class="modalGenre">
                        <p class="modalGenreName">
                            Family
                        </p>
                    </div>
                </div>
                <div class="modalBannerBtn">
                    <button class='modalLikeBtn'>
                        <div class="modalLikeBtnImg"></div>
                    </button>
                </div>
            </div>
            
            <div class="modalCardContainer">
                <a id="magnet"><svg xmlns="http://www.w3.org/2000/svg" height="32" width="32" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg></a>
                <div class="modalRating modalCard">
                    <p class="modalCardTitle">rating</p>
                    <p class="modalRating modalCardContent"></p>
                </div>
                <div class="modalRelease modalCard">
                    <p class="modalCardTitle">release</p>
                    <p class="modalReleaseDate modalCardContent"></p>
                </div>
                <div class="modalBudget modalCard">
                    <p class="modalCardTitle">budget</p>
                    <p class="modalBudget modalCardContent"></p>
                </div>
                <div class="modalLength modalCard">
                    <p class="modalCardTitle">length</p>
                    <p class="modalLength modalCardContent"></p>
                </div>
            </div>
        </div>
        <div class="modalDescriptionCastHypeContainer">
            <div class="modalDescriptionCastHype">
                <div class="modalDescriptionCast">
                    <section class="modalDescriptionContainer">
                        <h3 class="modalSectionTitle">Description</h3>
                        <p class="modalDescription">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cupiditate aliquid aliquam odio velit consequatur? Ducimus qui quia atque, optio dolore architecto? Officiis, necessitatibus aliquam! Asperiores ullam facere doloribus ipsum provident necessitatibus porro repudiandae dignissimos consequuntur dicta ducimus qui dolores vero officia quae deleniti minus, eum expedita excepturi numquam corporis voluptas.</p>
                    </section>
                    <section class="modalCastContainer">
                        <h3 class="modalSectionTitle">Notable Cast</h3>
                        <div class="modalCastArticleContainer">
                            <div class="modalCastArticle">
                                <div class="modalCastImg"></div>
                                <p class="modalCastName">Chris Pratt</p>
                            </div>
                            <div class="modalCastArticle">
                                <div class="modalCastImg"></div>
                                <p class="modalCastName">Chris Pratt</p>
                            </div>
                            <div class="modalCastArticle">
                                <div class="modalCastImg"></div>
                                <p class="modalCastName">Chris Pratt</p>
                            </div>
                        </div>
                    </section>
                </div>
                <section class="modalHypeContainer">
                <h3 class="modalSectionTitle">Hype</h3>
                <p class="modalHype"></p>
                </section>
            </div>
        </div>
    </dialog>
</div>