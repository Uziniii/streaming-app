<?php
namespace Streaming\Models; 

use \PDO; 

class WatchDetailManager {
    private $db; 

    public function __construct()
    {
        $this->db = new PDO('mysql:host=' . HOST . ':' . PORT . ';dbname=' . DATABASE . ';charset=utf8;', USER, PASSWORD);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function store(Watch_detail $watch_detail) {

    }
    
    public function updateWatched($movie_id) {

    }

    public function updateWatchList($movie_id) {

    }

    public function updateLiked($movie_id) {

    }

    public function deleteLiked($movie_id) {

    }


}
?>