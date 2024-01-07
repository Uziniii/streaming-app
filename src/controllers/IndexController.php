<?php
namespace Streaming\Controllers;

class IndexController {
    public function __construct()
    {
        
    }

    public function index() {
        // Redirect to the profiles page if the user hasn't selected a profile yet
        if (!isset($_SESSION['selectedProfileId'])) {
            header('Location: /profiles');
            exit();
        }
        
        header('Location: /movie');
    }
}
