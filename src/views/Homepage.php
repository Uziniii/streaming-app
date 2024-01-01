<?php
include(VIEWS . "Header.php");
?> 

<div class="banner">
    <div class="bannerContainer">
        <p class="bannerMovieDesc">movie description</p>
        <h1 class="bannerMovieTitle">Movie title</h1>
    </div>
    <section class="movieCaroussel">
        <!-- Les cartes horizontales vont être injectées ici -->
    </section>
</div>
<section class="categoryMovies">
<?php
    include VIEWS . "CategoryMovies.php";
    // $this->showCategories();
?>
</section>


<?php 
include(VIEWS . "Footer.php");
?> 