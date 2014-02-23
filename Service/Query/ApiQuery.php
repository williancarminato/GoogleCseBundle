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

    /**
     * @param string $key
     * @param string $value
     * @throws \InvalidArgumentException
     */
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


    /**
     * @param $key
     * @return bool
     * @throws \InvalidArgumentException
     */
    public function hasParameter($key)
    {
        if (empty($key)) {
            throw new \InvalidArgumentException('Missing $key parameter');
        }
        return array_key_exists($key, $this->parameters);
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