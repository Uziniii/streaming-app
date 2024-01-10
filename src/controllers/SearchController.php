<?php

namespace Streaming\Controllers;

use Streaming\Helpers\MoviesData;
use Streaming\Controllers\MovieController;


class SearchController
{   
    const API_URL = 'https://api.themoviedb.org/3';
    const API_KEY = '413b9803176b9511f07df571cbb2e11c';
    public function __construct()
    {

    }


       
  
    // public function search()
    // {   

    //     if (isset($_POST['search_query'])) {
    //         $queryMovie = $_POST['search_query'];
    //         $queryMovie = str_replace(' ','%20',$queryMovie);
    //         $queryMovie = rtrim($queryMovie);
    //         // var_dump($queryMovie);
            
    //         $url = self::API_URL . "/search/movie?api_key=" . self:: API_KEY .'&'.'query='.$queryMovie;
    //         // var_dump($url,"url");
    //         $searchResults = MoviesData::custom_file_get_contents($url);
    //         // var_dump($searchResults.title);
    //         $movieController = new MovieController();
    

    //         require VIEWS . 'Searchmovie.php';
    //     }


    // }
}
