<?php




// SearchController.php

namespace Streaming\Controllers;

require_once("../vendor/autoload.php");
require_once("../src/config/config.php");

require(__DIR__ . '/../../tmdb_v3-PHP-API--master/tmdb-api.php');



// SearchController.php

class SearchController
{
    public function showSearch()
    {
        $tmdb = new \TMDB();
        $searchResults = [];

        if (isset($_GET['search_query'])) {
            $searchQuery = $_GET['search_query'];
            
            // Effectuer la recherche avec $tmdb et obtenir les résultats
            $searchResults = $tmdb->searchMovie($searchQuery);
        }

        // Charger la vue avec les résultats de la recherche
        include(__DIR__ . "/../views/SearchMovie.php");
    }
}



