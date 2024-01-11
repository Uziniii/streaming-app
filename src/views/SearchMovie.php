<?php
include('../tmdb_v3-PHP-API-/tmdb-api.php');
include(VIEWS . "Header.php");


$movies = $tmdb->searchMovie($title);
foreach($movies as $movie){
    echo $movie->getTitle();
}
   
  


include(VIEWS . "Footer.php");
?>
