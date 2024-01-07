<?php

namespace Streaming\Models;

use \PDO;
use Exception;

class MovieManager
{
    private $db;

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

    public function getMovieById($movie_id)
    {
        $stmt = $this->db->prepare('SELECT * FROM movies WHERE id = :movie_id');
        $stmt->bindParam(':movie_id', $movie_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
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
