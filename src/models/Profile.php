<?php
namespace Streaming\Models;

class Profile 
{
  private $profile_id;
  private $profile_name;

  public function __construct()
  {

  }

  public function getProfileId()
  {
    return $this->profile_id;
  }

  public function setProfileId($profile_id)
  {
    $this->profile_id = $profile_id;
  }

  public function getProfileName()
  {
    return $this->profile_name;
  }

  public function setProfileName($profile_name)
  {
    $this->profile_name = $profile_name;
  }
}
