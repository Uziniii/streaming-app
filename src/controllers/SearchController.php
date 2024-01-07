<?php

namespace Streaming\Controllers;

use Streaming\Helpers\MoviesData;


class SearchController
{
    public function __construct()
    {

    }

    public function search()
    {

        if (isset($_POST['search_query'])) {
            $queryMovie = $_POST['search_query'];

            $searchResults = MoviesData::fetchData('search', 'movie', $queryMovie);
            var_dump($searchResults);

            require VIEWS . 'Searchmovie.php';
        }


    }
}
