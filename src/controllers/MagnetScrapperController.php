<?php
namespace Streaming\Controllers;
use Sunra\PhpSimple\HtmlDomParser;
class MagnetScrapperController
{
  public function test()
  {

    $query = "oppenheimer";
    $baseUrl = "https://torrentz2.nz/search?q=";
    $ch = curl_init($baseUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $html = curl_exec($ch);
    curl_close($ch);

// Utilise SimpleHTMLDom pour manipuler le HTML
    $dom = HtmlDomParser::str_get_html($html);

    $title = $dom->find('h1', 0)->plaintext;
    echo "test";
    var_dump('test');
    print_r('test');
  }

}

