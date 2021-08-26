<?php

namespace Guibmolina\Cinemarkcrawler\Test\Unit\Entities;

use Guibmolina\Cinemarkcrawler\Entities\Movie;
use PHPUnit\Framework\TestCase;

class MovieTest extends TestCase
{
    /** @test @dataProvider movies*/
    public function itMustReturnAllMovieroperties(string $title, ?string $ageRating, ?string $status): void
    {
        $movie = new Movie($title, $ageRating, $status);

        if(is_null($status))
        {
            $status = 'Em cartaz';
        }

        if(is_null($ageRating))
        {
            $ageRating = 'Não Informado';
        }

        $this->assertEquals($movie->title(), $title);
        $this->assertEquals($movie->ageRating(), $ageRating);
        $this->assertEquals($movie->status(), $status);
    }

    public function movies(): array
    {
        return [
            'movie1' => [
                'title' => 'Velozes e Furiosos',
                'age_rating' => 'Classificação 12 anos',
                'status' => 'Estreia',
            ],
            'movie2' => [
                'title' => 'Piratas do Caribe',
                'age_rating' => 'Classificação 14 anos',
                'status' => null,
            ],
            'movie3' => [
                'title' => 'Bela e a Fera',
                'age_rating' => null,
                'status' => null,
            ],
        ];
    }
}
