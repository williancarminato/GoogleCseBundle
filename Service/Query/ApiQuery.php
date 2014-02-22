<?php

namespace Carminato\GoogleCseBundle\Service\Query;

class ApiQuery implements ApiQueryInterface
{
    private $parameters;

    public function __construct()
    {
        $this->parameters = array();
    }

    public function addParameters(array $parameters)
    {
        // TODO: Implement addParameters() method.
    }

    public function addParameter($key, $value)
    {
        if (empty($key)) {
            throw new \InvalidArgumentException('Missing $key parameter');
        }

        $this->parameters[$key] = $value;
    }

    public function removeParameter($key)
    {
        // TODO: Implement removeParameter() method.
    }

    public function hasParameter($key)
    {
        // TODO: Implement hasParameter() method.
    }

    public function getParameter($key)
    {
        // TODO: Implement getParameter() method.
    }

    public function getQueryString()
    {
        // TODO: Implement getQueryString() method.
    }
}