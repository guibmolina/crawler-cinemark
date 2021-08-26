<?php

declare(strict_types = 1);

namespace Guibmolina\Cinemarkcrawler\Exceptions;

use DomainException;

class StatusInvalidException extends DomainException
{
    public function __construct() {

        parent::__construct('Status Inválido');
    }
}