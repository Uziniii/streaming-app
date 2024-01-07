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
    $stmt = $this->db->prepare('INSERT INTO profiles (profile_name) VALUES (?)');
    $stmt->execute([$profile->getProfileName()]);
    
    return $this->db->lastInsertId();
  }

  public function update($profile_id) {

  }

  public function getAllProfiles() {
    $stmt = $this->db->prepare('SELECT * FROM profiles');
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_CLASS, Profile::class);
  }

  public function getProfileById($profile_id) {
    
  }
}
