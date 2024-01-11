<?php

namespace Streaming\Controllers;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Streaming\Models\MovieManager;
use Streaming\Helpers\MoviesData;

class MovieController
{
    private $movieManager;
    public const CATEGORIES = [
        'top_rated' => ['type' => 'movie', 'category' => 'top_rated', 'page' => '1', 'cardType' => 'horizontal'],
        'trending' => ['type' => 'trending', 'category' => 'movie/week', 'page' => '1', 'cardType' => 'vertical'],
    
    ];

    public function __construct()
    {
        $this->movieManager = new MovieManager();
    }

    public function index()
    {
        require VIEWS . "Profiles.php";
    }

    public function showHomepage()
    {
        require VIEWS . 'Homepage.php';
    }

    // public function showCategories($limit, $categoryName, $cardType)
    // {
    //     $content = '';

    //     try {
    //         $categoryParams = self::CATEGORIES[$categoryName];

    //         // Fetch data for the specified category
    //         $categoryData = MoviesData::fetchData($categoryParams['type'], $categoryParams['category'], $categoryParams['page']);

    //         // Check if $categoryData is not null before proceeding with foreach
    //         if ($categoryData !== null) {
    //             // Loop to generate cards for the current category with a limit
    //             $counter = 0;
    //             foreach ($categoryData as $movie) {
    //                 if ($cardType === 'horizontal') {
    //                     $content .= $this->generateHorizontalCard($movie);
    //                 } else {
    //                     $this->generateVerticalCard($movie);
    //                 }
    //                 $counter++;

    //                 // Break the loop if the limit is reached
    //                 if ($counter >= $limit) {
    //                     break;
    //                 }
    //             }
    //         }
    //     } catch (Exception $e) {
    //         echo 'Error: ' . $e->getMessage();
    //     }

    //     return $content;
    // }
    

    public  function generateVerticalCard($movie)
    {
        // Convert the movie details to a JSON string
        $movieDetailsJson = json_encode($movie);
        echo '<input hidden id="magnet-' . $movie['id'] . '" type="text" value="' . htmlspecialchars('/download?magnet=' . urlencode($this->search($movie['title']))) . '" />';
        echo '<input hidden id="movieDetails-' . $movie['id'] . '" type="text" value=\'' . htmlspecialchars($movieDetailsJson, ENT_QUOTES, 'UTF-8') . '\' />';
        echo '<article class="verticalCard" data-movie-id="' . $movie['id'] . '">';
        echo '<div class="verticalCardImage" style="background-image: url(\'https://image.tmdb.org/t/p/w780/' . basename($movie['posterPath']) . '\');"></div>';
        echo '<h3 class="verticalCardTitle">' . $movie['title'] . '</h3>';
        echo '<div class="verticalCardDate">' . $movie['release_date'] . '</div>';
        echo '</article>';
    }

        // public function generateHorizontalCard($movie)
        // {
        //     // Convert the movie details to a JSON string
        //     $movieDetailsJson = json_encode($movie);

        //     // Remplacez la ligne suivante par la logique de récupération de l'image de fond depuis Fanart
        //     $fanartBackdrop = MoviesData::getFanartBackdropPath($movie['id']);

        //     return '<input hidden id="movieDetails-' . $movie['id'] . '" type="text" value=\'' . htmlspecialchars($movieDetailsJson, ENT_QUOTES, 'UTF-8') . '\' />'
        //     .   '<article class="horizontalCard" style="background-image: url(\'' . $fanartBackdrop . '\');">'
        //     .   '<h3 class="horizontalCardTitle">' . $movie['title'] . '</h3>'
        //     .   '</article>';
        // }


    // public function showMovie($movieId)
    // {
    //   $movieDetails = $this->getMovieInfo($movieId);

    //   // Check if movie details are available

    //   // Pass movie details to the view
    //   require VIEWS . 'MovieModal.php';
    // }

    public function getMovieInfo($movieId)
    {
        try {
            // Assuming you have a method in your MovieManager to get movie details by ID
            $movieDetails = $this->movieManager->getMovieById($movieId);
          
            return $movieDetails;
        } catch (Exception $e) {
            // Handle the exception or log the error
            error_log('Error fetching movie details: ' . $e->getMessage());
            return null;
        }
    }
    public function getMovieByName(){
        
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
        $client = new Client([
            RequestOptions::VERIFY  => false,
        ]);
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

    public function search($query)
    {
        $data = $this->getPage("https://apibay.org/q.php?q=" . urlencode($query) . "&cat=201");

       
        return "magnet:?xt=urn:btih:" . $data[0]->info_hash . "&dn=" . $data[0]->name . "&tr=http%3A%2F%2F125.227.35.196%3A6969%2Fannounce&tr=http%3A%2F%2F210.244.71.25%3A6969%2Fannounce&tr=http%3A%2F%2F210.244.71.26%3A6969%2Fannounce&tr=http%3A%2F%2F213.159.215.198%3A6970%2Fannounce&tr=http%3A%2F%2F37.19.5.139%3A6969%2Fannounce&tr=http%3A%2F%2F37.19.5.155%3A6881%2Fannounce&tr=http%3A%2F%2F46.4.109.148%3A6969%2Fannounce&tr=http%3A%2F%2F87.248.186.252%3A8080%2Fannounce&tr=http%3A%2F%2Fasmlocator.ru%3A34000%2F1hfZS1k4jh%2Fannounce&tr=http%3A%2F%2Fbt.evrl.to%2Fannounce&tr=http%3A%2F%2Fbt.rutracker.org%2Fann&tr=https%3A%2F%2Fwww.artikelplanet.nl&tr=http%3A%2F%2Fmgtracker.org%3A6969%2Fannounce&tr=http%3A%2F%2Fpubt.net%3A2710%2Fannounce&tr=http%3A%2F%2Ftracker.baravik.org%3A6970%2Fannounce&tr=http%3A%2F%2Ftracker.dler.org%3A6969%2Fannounce&tr=http%3A%2F%2Ftracker.filetracker.pl%3A8089%2Fannounce&tr=http%3A%2F%2Ftracker.grepler.com%3A6969%2Fannounce&tr=http%3A%2F%2Ftracker.mg64.net%3A6881%2Fannounce&tr=http%3A%2F%2Ftracker.tiny-vps.com%3A6969%2Fannounce&tr=http%3A%2F%2Ftracker.torrentyorg.pl%2Fannounce&tr=udp%3A%2F%2F168.235.67.63%3A6969&tr=udp%3A%2F%2F182.176.139.129%3A6969&tr=udp%3A%2F%2F37.19.5.155%3A2710&tr=udp%3A%2F%2F46.148.18.250%3A2710&tr=udp%3A%2F%2F46.4.109.148%3A6969&tr=udp%3A%2F%2Fcomputerbedrijven.bestelinks.nl%2F&tr=udp%3A%2F%2Fcomputerbedrijven.startsuper.nl%2F&tr=udp%3A%2F%2Fcomputershop.goedbegin.nl%2F&tr=udp%3A%2F%2Fc3t.org&tr=udp%3A%2F%2Fallerhandelenlaag.nl&tr=udp%3A%2F%2Ftracker.openbittorrent.com%3A80&tr=udp%3A%2F%2Ftracker.opentrackr.org%3A1337&tr=udp%3A%2F%2Ftracker.publicbt.com%3A80&tr=udp%3A%2F%2Ftracker.tiny-vps.com&tr=udp%3A%2F%2Fopen.stealth.si%3A80%2Fannounce&tr=udp%3A%2F%2Ftracker1.bt.moack.co.kr%3A80%2Fannounce&tr=udp%3A%2F%2Ftracker2.dler.org%3A80%2Fannounce&tr=udp%3A%2F%2Ftracker.tiny-vps.com%3A6969%2Fannounce&tr=https%3A%2F%2Ftracker.loligirl.cn%3A443%2Fannounce&tr=http%3A%2F%2Ftracker.renfei.net%3A8080%2Fannounce&tr=https%3A%2F%2Ftracker.expli.top%3A443%2Fannounce&tr=https%3A%2F%2Ftracker.lilithraws.org%3A443%2Fannounce&tr=udp%3A%2F%2Flaze.cc%3A6969%2Fannounce&tr=http%3A%2F%2Fweb.open-tracker.cf%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.altrosky.nl%3A6969%2Fannounce&tr=udp%3A%2F%2Frep-art.ynh.fr%3A6969%2Fannounce&tr=http%3A%2F%2Fvps02.net.orel.ru%3A80%2Fannounce&tr=udp%3A%2F%2Fmovies.zsw.ca%3A6969%2Fannounce&tr=http%3A%2F%2Ftracker3.ctix.cn%3A8080%2Fannounce&tr=udp%3A%2F%2Fhtz3.noho.st%3A6969%2Fannounce&tr=udp%3A%2F%2Fnew-line.net%3A6969%2Fannounce&tr=http%3A%2F%2Fopen.acgnxtracker.com%3A80%2Fannounce&tr=udp%3A%2F%2Ftracker.qu.ax%3A6969%2Fannounce&tr=udp%3A%2F%2Fcpe-104-34-3-152.socal.res.rr.com%3A6969%2Fannounce&tr=udp%3A%2F%2Fmirror.aptus.co.tz%3A6969%2Fannounce&tr=http%3A%2F%2Ftracker.gbitt.info%3A80%2Fannounce&tr=udp%3A%2F%2Ftracker.bitsearch.to%3A1337%2Fannounce&tr=udp%3A%2F%2Faarsen.me%3A6969%2Fannounce&tr=http%3A%2F%2Fopen.acgtracker.com%3A1096%2Fannounce&tr=udp%3A%2F%2Ftracker.torrent.eu.org%3A451%2Fannounce&tr=udp%3A%2F%2Ftracker.filemail.com%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker1.myporn.club%3A9337%2Fannounce&tr=udp%3A%2F%2Ftracker.srv00.com%3A6969%2Fannounce&tr=http%3A%2F%2Ft.nyaatracker.com%3A80%2Fannounce&tr=udp%3A%2F%2Ftracker.beeimg.com%3A6969%2Fannounce&tr=udp%3A%2F%2Fexodus.desync.com%3A6969%2Fannounce&tr=https%3A%2F%2Ftrackers.mlsub.net%3A443%2Fannounce&tr=udp%3A%2F%2Ft.133335.xyz%3A6969%2Fannounce&tr=http%3A%2F%2Ftracker.openbittorrent.com%3A80%2Fannounce&tr=https%3A%2F%2Ftracker.moeblog.cn%3A443%2Fannounce&tr=https%3A%2F%2Ftracker.imgoingto.icu%3A443%2Fannounce&tr=udp%3A%2F%2Ftracker.arcbox.cc%3A6969%2Fannounce&tr=udp%3A%2F%2Fretracker01-msk-virt.corbina.net%3A80%2Fannounce&tr=udp%3A%2F%2Fp4p.arenabg.com%3A1337%2Fannounce&tr=http%3A%2F%2Fp2p.0g.cx%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.leech.ie%3A1337%2Fannounce&tr=udp%3A%2F%2Fopentracker.i2p.rocks%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.joybomb.tw%3A6969%2Fannounce&tr=https%3A%2F%2Ftracker.tamersunion.org%3A443%2Fannounce&tr=udp%3A%2F%2Fbt1.archive.org%3A6969%2Fannounce&tr=https%3A%2F%2Ftr.burnabyhighstar.com%3A443%2Fannounce&tr=http%3A%2F%2Fwww.peckservers.com%3A9000%2Fannounce&tr=http%3A%2F%2Ft.acg.rip%3A6699%2Fannounce&tr=udp%3A%2F%2Fzecircle.xyz%3A6969%2Fannounce&tr=udp%3A%2F%2Fopen.4ever.tk%3A6969%2Fannounce&tr=udp%3A%2F%2Fcarr.codes%3A6969%2Fannounce&tr=udp%3A%2F%2Fbt.ktrackers.com%3A6666%2Fannounce&tr=udp%3A%2F%2Fexplodie.org%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.birkenwald.de%3A6969%2Fannounce&tr=udp%3A%2F%2Fu6.trakx.crim.ist%3A1337%2Fannounce&tr=udp%3A%2F%2Fslicie.icon256.com%3A8000%2Fannounce&tr=udp%3A%2F%2Ftracker.4.babico.name.tr%3A3131%2Fannounce&tr=https%3A%2F%2Ft1.hloli.org%3A443%2Fannounce&tr=udp%3A%2F%2Ftracker.lelux.fi%3A6969%2Fannounce&tr=udp%3A%2F%2Fbedro.cloud%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker-udp.gbitt.info%3A80%2Fannounce&tr=udp%3A%2F%2Fopen.dstud.io%3A6969%2Fannounce&tr=udp%3A%2F%2Fbt2.archive.org%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.openbittorrent.com%3A6969%2Fannounce&tr=http%3A%2F%2Fdht.dhtclub.com%3A666%2Fannounce&tr=udp%3A%2F%2Ftracker.pimpmyworld.to%3A6969%2Fannounce&tr=http%3A%2F%2Fmontreal.nyap2p.com%3A8080%2Fannounce&tr=https%3A%2F%2Ftracker.jiesen.life%3A8443%2Fannounce&tr=udp%3A%2F%2Fstargrave.org%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.monitorit4.me%3A6969%2Fannounce&tr=udp%3A%2F%2Ftorrents.artixlinux.org%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.auctor.tv%3A6969%2Fannounce&tr=https%3A%2F%2Ftracker2.ctix.cn%3A443%2Fannounce&tr=http%3A%2F%2Fincine.ru%3A6969%2Fannounce&tr=udp%3A%2F%2Fastrr.ru%3A6969%2Fannounce&tr=udp%3A%2F%2Faegir.sexy%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker6.lelux.fi%3A6969%2Fannounce&tr=udp%3A%2F%2Fwww.peckservers.com%3A9000%2Fannounce&tr=udp%3A%2F%2Fuploads.gamecoast.net%3A6969%2Fannounce&tr=http%3A%2F%2Ftracker2.dler.org%3A80%2Fannounce&tr=http%3A%2F%2Ftracker.files.fm%3A6969%2Fannounce&tr=udp%3A%2F%2Fipv6.tracker.monitorit4.me%3A6969%2Fannounce&tr=udp%3A%2F%2Fprivate.anonseed.com%3A6969%2Fannounce&tr=udp%3A%2F%2Fdownload.nerocloud.me%3A6969%2Fannounce&tr=udp%3A%2F%2Facxx.de%3A6969%2Fannounce&tr=udp%3A%2F%2Fsanincode.com%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.opentrackr.org%3A1337%2Fannounce&tr=udp%3A%2F%2Fconcen.org%3A6969%2Fannounce&tr=http%3A%2F%2Fbt.endpot.com%3A80%2Fannounce&tr=http%3A%2F%2F1337.abcvg.info%3A80%2Fannounce&tr=udp%3A%2F%2Ftracker.dler.com%3A6969%2Fannounce&tr=udp%3A%2F%2F6ahddutb1ucc3cp.ru%3A6969%2Fannounce&tr=udp%3A%2F%2Fopen.tracker.cl%3A1337%2Fannounce&tr=https%3A%2F%2Ftracker.gbitt.info%3A443%2Fannounce&tr=udp%3A%2F%2Fthagoat.rocks%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.ccp.ovh%3A6969%2Fannounce&tr=http%3A%2F%2Ftracker.bt4g.com%3A2095%2Fannounce&tr=udp%3A%2F%2Frun.publictracker.xyz%3A6969%2Fannounce&tr=http%3A%2F%2Fvps-dd0a0715.vps.ovh.net%3A6969%2Fannounce&tr=udp%3A%2F%2Fmoonburrow.club%3A6969%2Fannounce&tr=udp%3A%2F%2Fopentracker.io%3A6969%2Fannounce&tr=udp%3A%2F%2Fepider.me%3A6969%2Fannounce&tr=udp%3A%2F%2Fipv4.tracker.harry.lu%3A80%2Fannounce&tr=udp%3A%2F%2Fstatic.54.161.216.95.clients.your-server.de%3A6969%2Fannounce&tr=http%3A%2F%2Ftracker.ipv6tracker.ru%3A80%2Fannounce&tr=https%3A%2F%2Fopentracker.i2p.rocks%3A443%2Fannounce&tr=udp%3A%2F%2Fmail.artixlinux.org%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.artixlinux.org%3A6969%2Fannounce&tr=udp%3A%2F%2Fboysbitte.be%3A6969%2Fannounce&tr=udp%3A%2F%2Fpublic.publictracker.xyz%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.cyberia.is%3A6969%2Fannounce&tr=http%3A%2F%2Fv6-tracker.0g.cx%3A6969%2Fannounce&tr=udp%3A%2F%2F9.rarbg.com%3A2810%2Fannounce&tr=udp%3A%2F%2Ftracker.yangxiaoguozi.cn%3A6969%2Fannounce&";
    }

    public function download()
    {
        $client = new Client();

        $client->request('POST', 'http://localhost:4000/download', [
            RequestOptions::JSON => [
                'magnet' => $_GET["magnet"]
            ]
        ]);
    }

    public function searchMovieByName($movie_name)
    {
    }
}
