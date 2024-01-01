<?php
// Assuming you have already included necessary files and initialized constants
require_once("../vendor/autoload.php");
require_once("../src/config/config.php");

// Create an instance of MovieController
$movieController = new Streaming\Controllers\MovieController(new Streaming\Models\MovieManager());

?>
<div class="trendingCategory">
    <div class="categoryTitleContainer">
        <img src="/img/icons8-flame-48.png" alt="" class="trendingCategoryLogo categoryLogo">
        <h2 class="trendingCategoryTitle categoryTitle">
            Trending
        </h2>
    </div>
    <div class="verticalCardRow">
        <?php
            echo $movieController->showCategories($limit = 5,"trending");
        ?>
    </div>
</div>


