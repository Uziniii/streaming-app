<?php
// Assuming you have already included necessary files and initialized constants
require_once("../vendor/autoload.php");
require_once("../src/config/config.php");

// Create an instance of MovieController
$movieController = new Streaming\Controllers\MovieController(new Streaming\Models\MovieManager());

?>

    <div class="bannerContainer">
        <p class="bannerMovieDesc">movie description</p>
        <h1 class="bannerMovieTitle">Movie title</h1>
    </div>
    <section class="movieCaroussel">
    <?php
            
            echo $movieController->showCategories($limit = 4, "trending", "horizontal");
        
            
        ?>
    </section>
