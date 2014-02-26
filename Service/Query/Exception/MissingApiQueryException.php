<?php

namespace Carminato\GoogleCseBundle\Service\Query\Exception;

class MissingApiQueryException extends \RuntimeException
{
    public function __construct($message = 'Missing query', \Exception $previous = null)
    {
        parent::__construct($message, 500, $previous);
    }
} 