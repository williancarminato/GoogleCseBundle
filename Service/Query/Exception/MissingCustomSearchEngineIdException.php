<?php

namespace Carminato\GoogleCseBundle\Service\Query\Exception;

class MissingCustomSearchEngineIdException extends \RuntimeException
{
    public function __construct($message = 'Missing cx/cref id', \Exception $previous = null)
    {
        parent::__construct($message, 500, $previous);
    }
} 