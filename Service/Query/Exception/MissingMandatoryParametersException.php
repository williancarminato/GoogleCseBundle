<?php
/**
 * Created by PhpStorm.
 * User: willian
 * Date: 2/25/14
 * Time: 10:54 AM
 */

namespace Carminato\GoogleCseBundle\Service\Query\Exception;


class MissingMandatoryParametersException extends \RuntimeException
{
    public function __construct($message = 'Missing mandatory Google CSE parameters', \Exception $previous = null)
    {
        parent::__construct($message, 500, $previous);
    }
} 