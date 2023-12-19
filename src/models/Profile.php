<?php
namespace Streaming\Models;

class Profile 
{
  private $profil_id;
  private $profil_name;

  public function __construct()
  {

  }

  public function getProfilId()
  {
    return $this->profil_id;
  }

  public function setProfilId($profil_id)
  {
    $this->profil_id = $profil_id;
  }

  public function getProfilName()
  {
    return $this->profil_name;
  }

  public function setProfilName($profil_name)
  {
    $this->profil_name = $profil_name;
  }

}
