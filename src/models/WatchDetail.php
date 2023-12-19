<?php

namespace Streaming\models;

class Watch_detail {
    private $watch_detail_id;
    private $watch_detail_time;
    private $watch_detail_liked;
    private $watch_detail_watched;
    
    public function __construct() {

    }

    public function setWatchDetailId($watch_detail_id) {
        $this->watch_detail_id = $watch_detail_id;
    }
    public function getWatchDetailId() {
        return $this->watch_detail_id;
    }

    public function setWatchDetailTime($watch_detail_time) {
        $this->watch_detail_time = $watch_detail_time;
    }
    public function getWatchDetailTime() {
        return $this->watch_detail_time;
    }

    public function setWatchDetailLiked($watch_detail_liked) {
        $this->watch_detail_liked = $watch_detail_liked;
    }
    public function getWatchDetailLiked() {
        return $this->watch_detail_liked;
    }
    public function setWatchDetailWatched($watch_detail_watched) {
        $this->watch_detail_watched = $watch_detail_watched;
    }

    
}
?>