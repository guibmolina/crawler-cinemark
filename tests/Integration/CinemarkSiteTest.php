<?php

declare(strict_types=1);

namespace Guibmolina\Cinemarkcrawler\Test\Integration;

use PHPUnit\Framework\TestCase;
use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;

class CinemarkSiteTest extends TestCase
{
    /** @test @dataProvider subjects */
    public function itMustCheckIfSiteIsOn($title, $subject): void
    {
       $browser = new HttpBrowser(HttpClient::create());

       $crawler = $browser->request('GET', 'https://www.cinemark.com.br/sao-paulo/filmes/' . $subject);

       $this->assertEquals($title, $crawler->filter('header .title')->text());
    }

    public function subjects(): array
    {
        return [
            'em-cartaz' => [
                'Em cartaz',
                'em-cartaz',
            ],
            'em-breve' => [
                'Em breve',
                'em-breve',
            ],
        ];
    }
}