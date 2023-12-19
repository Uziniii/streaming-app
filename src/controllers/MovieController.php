<?php
namespace Streaming\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

class MovieController 
{
  public function index()
  {
    require VIEWS . "Profiles.php";
  }

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

  public function download()
  {
    $client = new Client();

    $client->request('POST', 'http://localhost:4000/download', [
      RequestOptions::JSON => [
        'magnet' => $_POST["magnet"]
      ]
    ]);
  }

  public function searchTest()
  {
    
    // Assuming you have a PHP file that receives parameters via GET or POST
    $client = new Client();
    
    $response = $client->request('GET', 'https://api.themoviedb.org/3/authentication', [
      'headers' => [
        'Authorization' => 'Bearer 413b9803176b9511f07df571cbb2e11c',
        'accept' => 'application/json',
      ],
    ]);
    
    var_dump( $response->getBody());

  }
}
