<?php
namespace Streaming\Models;

use \PDO;
use Exception;

class MovieManager 
{
    private $db;
    public const API_URL = "https://api.themoviedb.org/3";
    public const API_KEY = "413b9803176b9511f07df571cbb2e11c";

    private const genreId = [
        ["id" => 28, "name" => "Action"],
        ["id" => 12, "name" => "Adventure"],
        [ "id"=> 16, "name"=> "Animation" ],
        [ "id"=> 35, "name"=> "Comedy" ],
        [ "id"=> 80, "name"=> "Crime" ],
        [ "id"=> 99, "name"=> "Documentary" ],
        [ "id"=> 18, "name"=> "Drama" ],
        [ "id"=> 10751, "name"=> "Family" ],
        [ "id"=> 14, "name"=> "Fantasy" ],
        [ "id"=> 36, "name"=> "History" ],
        [ "id"=> 27, "name"=> "Horror" ],
        [ "id"=> 10402, "name"=> "Music" ],
        [ "id"=> 9648, "name"=> "Mystery" ],
        [ "id"=> 10749, "name"=> "Romance" ],
        [ "id"=> 878, "name"=> "Science Fiction" ],
        [ "id"=> 10770, "name"=> "TV Movie" ],
        [ "id"=> 53, "name"=> "Thriller" ],
        [ "id"=> 10752, "name"=> "War" ],
        [ "id"=> 37, "name"=> "Western" ],
    ];

    public function __construct()
    {
        $this->db = new PDO('mysql:host=' . HOST . ':' . PORT . ';dbname=' . DATABASE . ';charset=utf8;', USER, PASSWORD);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getAllMovies()
    {
        $stmt = $this->db->query('SELECT * FROM movies');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getMovieCredits($movieId)
    {
        $creditsResponse = file_get_contents(self::API_URL."/movie/".$movieId."/credits?api_key=".self::API_KEY);
        $creditsData = json_decode($creditsResponse, true);
        return $creditsData;
    }

    public function fetchData($params1, $params2, $params3)
    {
        try {
            $url = self::API_URL . "/" . $params1 . "/" . $params2 . "?language=en-US&page=" . $params3 . "&api_key=" . self::API_KEY;
            $response = file_get_contents($url);
            if ($response === false) {
                throw new Exception('Failed to fetch data from the API.');
            }

            $data = json_decode($response, true);

            if (!isset($data["results"])) {
                throw new Exception('No results found in the API response.');
            }

            $mappedData = array_map(function ($e) {
                $creditsData = $this->getMovieCredits($e["id"]);

                $director = array_filter($creditsData["crew"], function ($crew) {
                    return $crew["job"] === "Director";
                });

                $directorName = !empty($director) && isset($director[0]["name"]) ? $director[0]["name"] : "Unknown";

                return [
                    "title" => $e["title"],
                    "posterPath" => "https://image.tmdb.org/t/p/w1280" . $e["poster_path"],
                    "vote_average" => $e["vote_average"],
                    "vote_count" => $e["vote_count"],
                    "popularity" => $e["popularity"],
                    "overview" => $e["overview"],
                    "genre_ids" => $this->getGenreName($e["genre_ids"][0]),
                    "id" => $e["id"],
                    "release_date" => $e["release_date"],
                    "backdrop_path" => "https://image.tmdb.org/t/p/w1280" . $e["backdrop_path"],
                    "director" => $directorName,
                ];
            }, $data["results"]);

            return $mappedData;
        } catch (Exception $error) {
            error_log("Error fetching data: " . $error->getMessage());
        }
    }

    public function getMovieById($movie_id)
    {
        $stmt = $this->db->prepare('SELECT * FROM movies WHERE id = :movie_id');
        $stmt->bindParam(':movie_id', $movie_id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    private function getGenreName($genreId)
    {
        $genre = array_filter(self::genreId, function ($g) use ($genreId) {
            return $g["id"] === $genreId;
        });

        return $genre ? ($genre[0]["name"] ?? "Unknown") : "Unknown";
    }

    public function store(Movie $movie)
    {
        // Your store method implementation
    }

    public function getMovieByName($movie_name)
    {
        // Your getMovieByName method implementation
    }
}
?>
