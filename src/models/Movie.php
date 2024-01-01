<?php

namespace Streaming\Models;

class Movie {
    private $movie_id;
    private $movie_file;
    private $movie_title;
    private $movie_poster;
    private $movie_backdrop;
    private $movie_length;


    public function  __construct () {
        
    }

    public function setAll($movie_id, $movie_file, $movie_title, $movie_poster, $movie_backdrop, $movie_length) {
        $movie_id == null ?: $this->setmovieId($movie_id);
        $this->setMovieId($movie_id);
        $this->setMovieFile($movie_file);
        $this->setMovieTitle($movie_title);
        $this->setMoviePoster($movie_poster);
        $this->setMovieBackdrop($movie_backdrop);
        $this->setMovieLength($movie_length);
    }

    public function setMovieId($movie_id) {
        $this->movie_id = $movie_id;
    }
    public function getMovieId() {
        return $this->movie_id;
    }

    public function setMovieFile($movie_file) {
        $this->movie_file = $movie_file;
    }
    public function getMovieFile() {
        return $this->movie_file;
    }

    public function setMovieTitle($movie_title) {
        $this->movie_title = $movie_title;
    }
    public function getMovieTitle() {
        return $this->movie_title;
    }

    public function setMoviePoster($movie_poster) {
        $this->movie_poster = $movie_poster;
    }
    public function getMoviePoster() {
        return $this->movie_poster;
    }

    public function setMovieBackdrop($movie_backdrop) {
        $this->movie_backdrop = $movie_backdrop;
    }
    public function getMovieBackdrop() {
        return $this->movie_backdrop;
    }

    public function setMovieLength($movie_length) {
        $this->movie_length = $movie_length;
    }
    public function getMovieLength() {
        return $this->movie_length;
    }
}


