<?php

declare(strict_types=1);

namespace Guibmolina\Cinemarkcrawler\Test\Unit\Services;

use Guibmolina\Cinemarkcrawler\Exceptions\SiteRequestException;
use Guibmolina\Cinemarkcrawler\Exceptions\StatusInvalidException;
use Guibmolina\Cinemarkcrawler\Repositories\Movie as MovieRepository;
use Guibmolina\Cinemarkcrawler\Services\SearchMovies;
use PHPUnit\Framework\TestCase;

class SearchMoviesTest extends TestCase
{

    private MovieRepository $repository;


    public function setUp(): void
    {
        parent::setUp();   
        
        $this->repository = $this->createStub(MovieRepository::class);
    }

    /** @test  @dataProvider movieType*/
    public function itMustReturnJson(string $movieType)
    {
        $searchMovies = new SearchMovies($this->repository);

        $this->assertJson($searchMovies->moviesOn($movieType));
    }

    /** @test  @dataProvider invalidMovieType*/
    public function itMustThrowStatusInvalidException(string $movieType)
    {
        $this->expectException(StatusInvalidException::class);

        $searchMovies = new SearchMovies($this->repository);

        $searchMovies->moviesOn($movieType);
    }

    /** @test  @dataProvider movieType*/
    public function itMustThrowSiteRequestException(string $movieType)
    {
        $this->expectException(SiteRequestException::class);

        $this->repository->method('movieByType')
            ->will($this->throwException(new SiteRequestException('Site Url')));

        $searchMovies = new SearchMovies($this->repository);

        $searchMovies->moviesOn($movieType);
    }

    public function movieType(): array
    {
        return [
            'type1' => ['em-cartaz'],
            'type2' => ['em-breve'],
        ];
    }

    public function invalidMovieType(): array
    {
        return [
            'type1' => ['cartaz'],
            'type22' => ['lançamentos'],
        ];
    }
}
