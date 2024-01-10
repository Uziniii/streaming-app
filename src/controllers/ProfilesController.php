<?php
namespace Streaming\Controllers;

use Streaming\Models\Profile;
use Streaming\Models\ProfileManager;

class ProfilesController
{
    private $profileManager;

    public function __construct()
    {
        $this->profileManager = new ProfileManager();
    }

    public function showProfiles() {
        $profiles = $this->profileManager->getAllProfiles();
        require VIEWS . "Profiles.php";
    }

    public function addProfile()
    {
        $profile = new Profile();
        $profile->setProfileName($_POST['name']);
        $this->profileManager->store($profile);

        session_start();

        $_SESSION['selectedProfileId'] = $profile->getProfileId();

        header('Location: /homepage');
    }

    public function showAddProfile()
    {
        require VIEWS . "AddProfile.php";
    }

    public function selectProfile($profile_id)
    {
        session_start();
        
        
        $_SESSION['selectedProfileId'] = $profile_id;

        header('Location: /homepage');
    }

    public function showCreateProfileForm() {
        // Méthode pour afficher le formulaire de création de profil
    }

    public function getProfileByName($profile_name) {
        // Méthode pour récupérer un profil par son nom
    }

    public function update($profile_id) {
        // Méthode pour mettre à jour un profil
    }

    public function delete($profile_id) {
        // Méthode pour supprimer un profil
    }
}
