<?php
namespace Streaming\Models;

use \PDO;

class ProfileManager
{
  private $db;

  public function __construct()
  {
    $this->db = new PDO('mysql:host=' . HOST . ':' . PORT . ';dbname=' . DATABASE . ';charset=utf8;', USER, PASSWORD);
    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  public function store(Profile $profile)
  {
  }

  public function update($profile_id) {

  }

  public function getProfileById($profile_id) {
    
  }
}
