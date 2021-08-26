<?php

declare(strict_types=1);

namespace Guibmolina\Cinemarkcrawler\Repositories;

use Exception;
use Guibmolina\Cinemarkcrawler\Entities\Movie as MovieEntity;
use Guibmolina\Cinemarkcrawler\Entities\MovieList;
use Guibmolina\Cinemarkcrawler\Exceptions\SiteRequestException;
use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;

class Movie
{
    private HttpBrowser $browser;

    private string $urlCinema;

    public function __construct()
    {
        $this->browser = new HttpBrowser(HttpClient::create());

        $this->urlCinema = 'https://www.cinemark.com.br/sao-paulo/filmes/';
    }

    public function movieByType(string $type): MovieList
    {
        try{

            $crawler =  $this->browser->request('GET', $this->urlCinema . $type);

        } catch(Exception $e) {
            throw new SiteRequestException($this->urlCinema . $type);
        }

        $movieList = new MovieList();

        $crawler->filter('article.movie div.movie-container')->each(function($node) use ($movieList, $type) {
            $title = $node->filter('.movie-title')->text();
            $status = null;
            $ageRating = null;
                
                if ($type === 'em-breve')
                {
                    $status = 'Estreia em breve';
                }
                
                if($node->filter('.rating-title')->count() > 0){
                    $ageRating = $node->filter('.rating-title')->text();
                }
        
                if ($node->filter('.movie-label')->count() > 0) {
                    $status = $node->filter('.movie-label')->text();
                }

                $movieList->add(new MovieEntity($title, $ageRating, $status));

            });

            return $movieList;
    }
}
