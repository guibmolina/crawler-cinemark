<?php

declare(strict_types=1);

namespace Guibmolina\Cinemarkcrawler\Test\Unit\Entities;

use Guibmolina\Cinemarkcrawler\Entities\Movie;
use Guibmolina\Cinemarkcrawler\Entities\MovieList;
use IteratorAggregate;
use PHPUnit\Framework\TestCase;

class MovieListTest extends TestCase
{
    private MovieList $movies;

    public function setUp(): void
    {
        parent::setUp();   
        $this->movies = new MovieList();
    }

    /** @test */
    public function itMustReturnIteratorAggregate(): void
    {
        $this->assertInstanceOf(IteratorAggregate::class, $this->movies);
    }

    /** @test */
    public function itMustAssertIsMovieEachItemOnMoviesList(): void
    {
        $this->movies->add(new Movie('Carros', "Classificação Livre", null));
        
        foreach($this->movies as $movie)
        {
            $this->assertInstanceOf(Movie::class, $movie);
        }
    }
}