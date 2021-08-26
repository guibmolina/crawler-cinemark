<?php

declare(strict_types = 1);

namespace Guibmolina\Cinemarkcrawler\Exceptions;

use DomainException;

class SiteRequestException extends DomainException
{
    public function __construct($siteUrl)
    {
        parent::__construct("O site $siteUrl está indisponível");
    }
}