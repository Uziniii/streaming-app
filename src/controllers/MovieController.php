<?php

namespace Streaming\Controllers;

require_once("../vendor/autoload.php");
require_once("../src/config/config.php");
use Exception;
use GuzzleHttp\Client;

use Streaming\Models\Movie;
use Streaming\Models\MovieManager;

class MovieController
{
  private $movieManager;
  public const CATEGORIES = [
    'top_rated' => ['type' => 'movie', 'category' => 'top_rated', 'page' => '1', 'cardType' => 'horizontal'],
    'trending' => ['type' => 'trending', 'category' => 'movie/week', 'page' => '1', 'cardType' => 'vertical'],

    // Add more categories as needed
];

  public function __construct(MovieManager $movieManager)
  {
    $this->movieManager = $movieManager;
  }


  public function index()
  {
    
    require VIEWS . "Profiles.php";
  }

  

  public function showHomepage()
  { 
    require VIEWS . 'Homepage.php';
  } 
  public function showCategories($limit, $categoryName) {
    $content = '';
    try {
        $categoryParams = self::CATEGORIES[$categoryName];

        // Fetch data for the specified category
        $categoryData = $this->movieManager->fetchData($categoryParams['type'], $categoryParams['category'], $categoryParams['page']);

        // Check if $categoryData is not null before proceeding with foreach
        if ($categoryData !== null) {
            // Loop to generate cards for the current category with a limit
            $counter = 0;
            foreach ($categoryData as $movie) {
                // Use the specific function for generating vertical cards
                $content .= $this->generateVerticalCard($movie);
                $counter++;

                // Break the loop if the limit is reached
                if ($counter >= $limit) {
                    break;
                }
            }
        }
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }

    return $content;
}



  


  // Function to generate a vertical card
  public function generateVerticalCard($movie)
{
    echo '<article class="verticalCard">';
    echo '<a href="movie/' . $movie['id'] . '"><div class="verticalCardImage" style="background-image: url(\'https://image.tmdb.org/t/p/w780/' . basename($movie['posterPath']) . '\');"></div></a>';
    echo '<h3 class="verticalCardTitle">' . $movie['title'] . '</h3>';
    echo '<div class="verticalCardDate">' . $movie['release_date'] . '</div>';
    echo '</article>';
}

  

  public function generateHorizontalCard($movie)
  {
    echo '<article class="horizontalCard" style="background-image: url(\'https://image.tmdb.org/t/p/w780/' . $movie['backdrop_path'] . '\');">';
    echo '<h3 class="horizontalCardTitle">' . $movie['title'] . '</h3>';
    echo '</article>';
  }


  public function showMovie($movieId)
  {
    $movieDetails = $this->getMovieInfo($movieId);

    // Check if movie details are available

        // Pass movie details to the view
        require VIEWS . 'MovieInfo.php';
    
  }

  public function getMovieInfo($movieId) {
    try {
        // Assuming you have a method in your MovieManager to get movie details by ID
        $movieDetails = $this->movieManager->getMovieById($movieId);
        var_dump($movieDetails); // Debugging statement
        return $movieDetails;
    } catch (Exception $e) {
        // Handle the exception or log the error
        error_log('Error fetching movie details: ' . $e->getMessage());
        return null;
    }
}




  // public function updateBanner($movie) {
  //   try {
  //     $apiUrl = MovieManager::API_URL;
  //     $apiKey = MovieManager::API_KEY;
  //     echo '<div class="banner startBannerAnimation" style="background-image: url(\'https://image.tmdb.org/t/p/w1280/' . $movie['backdrop_path'] . '\');">';
  //     echo '<h3 class="bannerMovieTitle starBannerAnimation">' . $movie['title'] . '</h3>';

  //     // Fetch movie credits using PHP
  //     $creditsResponse = file_get_contents($apiUrl . '/movie/' . $movie['id'] . '/credits?api_key=' . $apiKey);
  //     $creditsData = json_decode($creditsResponse, true);

  //     if (!$creditsData) {
  //         throw new Exception('Error decoding credits data');
  //     }

  //     $director = null;
  //     foreach ($creditsData['crew'] as $crewMember) {
  //         if ($crewMember['job'] === 'Director') {
  //             $director = $crewMember;
  //             break;
  //         }
  //     }

  //     $directorName = $director ? $director['name'] : 'Unknown';

  //     echo '<p class="bannerMovieDesc starBannerAnimation">Directed by ' . $directorName . '</p>';
  //     echo '</div>';
  //   } catch (Exception $e) {
  //       echo 'Error: ' . $e->getMessage();
  //   }
  // }

  // public function handleHover($movie) {
  //   $this->updateBanner($movie);
  // }



  private function getPage($url)
  {
    $client = new Client();
    $response = $client->request('GET', $url, [
      'headers' => [
        'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8',
        'accept-language: fr-FR,fr;q=0.9,en-US;q=0.8,en;q=0.7',
        'cache-control: max-age=0',
        'sec-ch-ua: "Brave";v="119", "Chromium";v="119", "Not?A_Brand";v="24"',
        'sec-ch-ua-mobile: ?0',
        'sec-ch-ua-platform: "macOS"',
        'sec-fetch-dest: document',
        'sec-fetch-mode: navigate',
        'sec-fetch-site: same-origin',
        'sec-fetch-user: ?1',
        'sec-gpc: 1',
        'upgrade-insecure-requests: 1',
      ],
      "referrer" => "https://thepiratebay.org/",
      "referrerPolicy" => "strict-origin-when-cross-origin",
      "mode" => "cors",
      'timeout' => 5000,
    ]);

    return json_decode($response->getBody()->getContents());
  }

  public function search()
  {
    $query = $_GET["q"];
    $data = $this->getPage("https://apibay.org/q.php?" . "q=" . urlencode($query) . "&cat=201");

    require VIEWS . "Search.php";
  }

  // public function download()
  // {
  //   $client = new Client();

  //   $client->request('POST', 'http://localhost:4000/download', [
  //     RequestOptions::JSON => [
  //       'magnet' => $_POST["magnet"]
  //     ]
  //   ])


  public function searchMovieByName($movie_name)
  {
  }
}
