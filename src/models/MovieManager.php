<?php
namespace Streaming\Models;

use \PDO;

class MovieManager 
{
  private $db;

  public function __construct()
  {
    $this->db = new PDO('mysql:host=' . HOST . ':' . PORT . ';dbname=' . DATABASE . ';charset=utf8;', USER, PASSWORD);
    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  public function store(Movie $movie)
  {
    
  }
}
