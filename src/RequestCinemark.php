<?php

declare(strict_types=1);

use Guibmolina\Cinemarkcrawler\Repositories\Movie;
use Guibmolina\Cinemarkcrawler\Services\SearchMovies;

require_once 'vendor/autoload.php';

$searchMovie = new SearchMovies(new Movie());

echo $searchMovie->moviesOn('em-cartaz');


