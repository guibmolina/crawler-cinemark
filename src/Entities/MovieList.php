<?php

declare(strict_types=1);

namespace Guibmolina\Cinemarkcrawler\Entities;

use ArrayIterator;
use IteratorAggregate;

class MovieList implements IteratorAggregate
{
    private array $movies;

    public function __construct()
    {
        $this->movies = [];
    }

    public function add(Movie $movie): void
    {
        $this->movies[] = $movie;
    }

    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->movies);
    }

    public function all(): array
    {
        return $this->movies;
    }
}