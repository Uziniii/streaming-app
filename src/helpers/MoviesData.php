<?php

namespace Streaming\Helpers;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

class MoviesData
{
    // private const genreId = [
    //     ["id" => 28, "name" => "Action"],
    //     ["id" => 12, "name" => "Adventure"],
    //     ["id" => 16, "name" => "Animation"],
    //     ["id" => 35, "name" => "Comedy"],
    //     ["id" => 80, "name" => "Crime"],
    //     ["id" => 99, "name" => "Documentary"],
    //     ["id" => 18, "name" => "Drama"],
    //     ["id" => 10751, "name" => "Family"],
    //     ["id" => 14, "name" => "Fantasy"],
    //     ["id" => 36, "name" => "History"],
    //     ["id" => 27, "name" => "Horror"],
    //     ["id" => 10402, "name" => "Music"],
    //     ["id" => 9648, "name" => "Mystery"],
    //     ["id" => 10749, "name" => "Romance"],
    //     ["id" => 878, "name" => "Science Fiction"],
    //     ["id" => 10770, "name" => "TV Movie"],
    //     ["id" => 53, "name" => "Thriller"],
    //     ["id" => 10752, "name" => "War"],
    //     ["id" => 37, "name" => "Western"],
    // ];
    // public const API_URL = "https://api.themoviedb.org/3";
    // public const API_KEY = "413b9803176b9511f07df571cbb2e11c";
    // public const API_KEY_HEADERS = "eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI2OWFjMzM3ZDFhMzllNzNjN2IwODA3MGJiNWMyZTFkOSIsInN1YiI6IjY1NzFlYjg0OTBmY2EzMDEyZDEzMDAyOCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.ur-C-iT-fYveg1kgqUoJISvVDM88GmdBQr5WGu3qmsY";
    // public static function custom_file_get_contents($url)
    // {
    //     return file_get_contents($url);
    // }
    // static public function getMovieCredits($movieId)
    // {
    //     $creditsResponse = file_get_contents(self::API_URL . "/movie/" . $movieId . "/credits?api_key=" . self::API_KEY);
    //     $creditsData = json_decode($creditsResponse, true);
    //     return $creditsData;
    // }

    // // static public function getMovieDetails($movieId) {
    // //     $detailsResponse = file_get_contents(self::API_URL . "/movie/" . $movieId . "&api_key=" . self::API_KEY);
    // //     $detailsData = json_decode($detailsResponse, true);
    // //     return $detailsData;
    // // }



    // static public function fetchData($params1, $params2, $params3)
    // {
    //     try {
    //         $url = self::API_URL . "/" . $params1 . "/" . $params2 . "?language=en-US&query=" . $params3 . "&api_key=" . self::API_KEY;
    //         $response = file_get_contents($url);

    //         if ($response === false) {
    //             throw new Exception('Failed to fetch data from the API.');
    //         }

    //         $data = json_decode($response, true);
            
    //         if (!isset($data["results"])) {
    //             throw new Exception('No results found in the API response.');
    //         }
            
    //         $mappedData = array_map(function ($e) {
    //             $creditsData = self::getMovieCredits($e["id"]);
    //             // $detailsData = self::getMovieDetails($e["id"]);
                
    //             $director = array_filter($creditsData["crew"], function ($crew) {
    //                 return $crew["job"] === "Director"; 
    //             });

    //             $directorName = !empty($director) && isset($director[0]["name"]) ? $director[0]["name"] : "Unknown";

    //             // $budget = array_filter($detailsData["budget"], function ($budget) {
    //             //     return ["budget"];
    //             // });

    //             // $runtime = array_filter($detailsData["runtime"], function($runtime) {
    //             //     return["runtime"];
    //             // });
                
    //             // Get fanart.tv backdrop poster path
    //             // $fanartBackdropPath = self::getFanartBackdropPath($e["id"]);
    //             var_dump($e["title"], $e["genre_ids"]);

    //             return [
    //                 "title" => $e["title"],
    //                 "posterPath" => "https://image.tmdb.org/t/p/w1280" . $e["poster_path"],
    //                 "vote_average" => $e["vote_average"],
    //                 "vote_count" => $e["vote_count"],
    //                 "popularity" => $e["popularity"],
    //                 "overview" => $e["overview"],
    //                 "genre_ids" => sizeof($e["genre_ids"]) === 0 ? null : self::getGenreName($e["genre_ids"][0]),
    //                 "id" => $e["id"],
    //                 "release_date" => date('F j, Y', strtotime($e["release_date"])),
    //                 // "backdrop_path" => $fanartBackdropPath,
    //                 "director" => $directorName,    
    //                 "rating" => $e["adult"] === true ? "18+" : "PG",
    //                 // "budget" => $budget,

    //             ];  
    //         }, $data["results"]);
        
    //         return $mappedData;
    //     } catch (Exception $error) {
    //         var_dump($error->getMessage());
    //         return [];
    //     }
    // }

    // // Ajoutez cette méthode à votre classe MovieManager
    // static public function getFanartBackdropPath($movieId): string
    // {
    //     $fanartApiKey = "95fc6dc6489a36cd8c65b82f555046ab"; // Remplacez par votre clé API fanart.tv
    //     $fanartApiUrl = "https://webservice.fanart.tv/v3/movies/" . $movieId . "?api_key=" . $fanartApiKey;

    //     $client = new Client([
    //         RequestOptions::VERIFY  => false,
    //     ]);;

    //     $fanartDataArray = json_decode($client->request("GET", $fanartApiUrl)->getBody()->getContents(), true);
        
    //     // Loguez les données récupérées depuis Fanart.tv
    //     error_log(print_r($fanartDataArray, true));

    //     // Vérifie si les données fanart ont été récupérées avec succès
    //     if (isset($fanartDataArray['moviebackground']) && !empty($fanartDataArray['moviebackground'])) {
    //         return $fanartDataArray['moviebackground'][0]['url'];
    //     }

    //     return ""; // Retourne une chaîne vide si aucune image n'est trouvée
    // }

    // static private function getGenreName($genreId)
    // {
    //     $genre = array_filter(self::genreId, function ($g) use ($genreId) {
    //         return $g["id"] === $genreId;
    //     });

    //     return $genre ? ($genre[0]["name"] ?? "Unknown") : "Unknown";
    // }
}
