<?php

declare(strict_types=1);

namespace Guibmolina\Cinemarkcrawler\Services;

use Guibmolina\Cinemarkcrawler\Exceptions\StatusInvalidException;
use Guibmolina\Cinemarkcrawler\Repositories\Movie as MovieRepository;

class SearchMovies
{
    private MovieRepository $repository;

    public function __construct(MovieRepository $repository)
    {
        $this->repository = $repository;
    }

    public function moviesOn(string $type): string
    {
        if($type != 'em-cartaz' && $type != 'em-breve')
        {
            throw new StatusInvalidException();
        }
        
       
        $movieList = $this->repository->movieByType($type);

        return $this->returnJson($movieList);
    
    }

    private function returnJson($movieList): string
    {
        $movies = [];

        foreach($movieList as $movie)
        {
            $movies[] = [
                'title' => $movie->title(),
                'age_reating' => $movie->ageRating(),
                'status' => $movie->status(),
            ];
        }

        return json_encode($movies);
    }

}

