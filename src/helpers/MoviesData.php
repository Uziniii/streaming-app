<?php

namespace Streaming\Helpers;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

$token  = new \Tmdb\ApiToken('your_tmdb_api_key_here');
$client = new \Tmdb\Client($token, ['secure' => false]);
	

class MoviesData
{
    
    public function __construct()
    {
       
    }

}
