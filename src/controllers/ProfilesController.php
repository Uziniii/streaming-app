<?php
namespace Streaming\Controllers;

use Streaming\Models\Profile;
use Streaming\Models\ProfileManager;

class ProfilesController
{
  public function addPage()
  {
    require VIEWS . "AddProfile.php";
  }

  public function showProfile($profile_id) {

  }

  public function showCreateProfileForm() {

  }

  public function getProfileByName($profile_name) {

  }

  public function update($profile_id) {

  }

  public function delete($profile_id) {

  }
}
