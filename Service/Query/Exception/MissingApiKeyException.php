<?php

namespace Carminato\GoogleCseBundle\Service\Query\Exception;

class MissingApiKeyException extends \RuntimeException
{
    public function __construct($message = 'Missing api key', \Exception $previous = null)
    {
        parent::__construct($message, 500, $previous);
    }
} 