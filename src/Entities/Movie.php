<?php

declare(strict_types=1);

namespace Guibmolina\Cinemarkcrawler\Entities;

class Movie
{
    private string $title;

    private ?string $ageRating;

    private ?string $status;

    public function __construct(string $title, ?string $ageRating = null, ?string $status = null)
    {
        $this->title = $title;
        $this->setAgeRating($ageRating);
        $this->setStatus($status);
    }

    public function title(): string
    {
        return $this->title;
    }
    
    private function setAgeRating(?string $ageRating): void
    {
        
        $this->ageRating = 'Não Informado';
        
        if(!is_null($ageRating))
        {
            $this->ageRating = $ageRating;
        }
        
    }

    public function ageRating(): string
    {
        return $this->ageRating;
    }


    private function setStatus(?string $status): void
    {
        
        $this->status = 'Em cartaz';

        if(!is_null($status))
        {
            $this->status = $status;
        }
        
    }

    public function status(): string
    {
        return $this->status;
    }
}