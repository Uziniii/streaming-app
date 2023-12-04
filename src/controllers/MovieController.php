<?php
namespace Streaming\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class MovieController 
{

  public function index()
  {
    require VIEWS . "index.php";
  }

  private function getPage($url)
  {
    $client = new Client();
    $response = $client->request('GET', $url, [
      'headers' => [
        "accept"=> "text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8",
        "accept-language"=> "fr-FR,fr;q=0.9",
        "cache-control"=> "max-age=0",
        "sec-ch-ua"=> "\"Brave\";v=\"119\", \"Chromium\";v=\"119\", \"Not?A_Brand\";v=\"24\"",
        "sec-ch-ua-mobile"=> "?0",
        "sec-ch-ua-platform"=> "\"macOS\"",
        "sec-fetch-dest"=> "document",
        "sec-fetch-mode"=> "navigate",
        "sec-fetch-site"=> "none",
        "sec-fetch-user"=> "?1",
        "sec-gpc"=> "1",
        "upgrade-insecure-requests"=> "1"
      ],
      'timeout' => 50,
    ]);

    $data = $response->getBody()->getContents();

    return $data;
  }

  public function search($keyword)
  {
    $page = 1;
    $getResults = $this->getPage("https://www.xn--thepratebay-fcb.com/s/page/" . $page . "/?q=" . urlencode($keyword) . "&video=on");
    var_dump($keyword);
    $results = array();

    //preg_match_all('/<div class="detName">(.*?)<\/td>/si', $getResults, $matches);
    preg_match_all('/<td class="vertTh">(.*?)<\/tr>/si', $getResults, $matches);
    foreach ($matches[1] as $result) {
      preg_match('/<a href="\/torrent\/(\d+)\//si', $result, $rMatches);
      $torrentID = $rMatches[1];
      $torrentLink = "https://thepiratebay.com/torrent/" . $torrentID . "/";

      preg_match('/class="detLink" title="Details for (.*?)">/si', $result, $rMatches);
      $title = $rMatches[1];

      preg_match('/<a href="magnet:(.*?)" title="Download this torrent using magnet">/si', $result, $rMatches);
      $magnet = "magnet:" . $rMatches[1];

      $results[] = (object) array(
        "Title" => $title,
        "TorrentID" => $torrentID,
        "TorrentLink" => $torrentLink,
        "Magnet" => $magnet,
      );
    }

    var_dump($results);
    // return $results;
  }

  public function searchTest()
  {
    
  // Assuming you have a PHP file that receives parameters via GET or POST
  
  
  require_once('vendor/autoload.php');
  
  $client = new \GuzzleHttp\Client();
  
  $response = $client->request('GET', 'https://api.themoviedb.org/3/authentication', [
    'headers' => [
      'Authorization' => 'Bearer 413b9803176b9511f07df571cbb2e11c',
      'accept' => 'application/json',
    ],
  ]);
  
  var_dump( $response->getBody());

  }
}
