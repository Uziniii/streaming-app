<?php

namespace Streaming\Controllers;

// Include the tmdb-api.php file
include('../tmdb_v3-PHP-API-/tmdb-api.php');

class SearchController
{
    private $tmdb;

    public function __construct()
    {
    
        $this->tmdb = new \TMDB(); 
    }

    public function showSearch()
{
    echo "Before searchMovie<br>";

    $searchQuery = isset($_POST['search_query']) ? $_POST['search_query'] : '';

    $movies = $this->tmdb->searchMovie($searchQuery);

    echo "After searchMovie<br>";

  
    require VIEWS . 'SearchMovie.php';

    echo "After require<br>";
}
}
