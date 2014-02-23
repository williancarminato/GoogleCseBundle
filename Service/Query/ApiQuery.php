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
        $this->parameters = array_merge($this->parameters, $parameters);

        return $this;
    }

    /**
     * @param string $key
     * @param string $value
     * @return $this
     * @throws \InvalidArgumentException
     */
    public function addParameter($key, $value)
    {
        if (empty($key)) {
            throw new \InvalidArgumentException('Missing $key parameter');
        }

        $this->parameters[$key] = $value;
        return $this;
    }

    public function removeParameter($key)
    {
        if (empty($key)) {
            throw new \InvalidArgumentException('Missing $key parameter');
        }
        unset($this->parameters[$key]);

        return $this;
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
        if (empty($key)) {
            throw new \InvalidArgumentException('Missing $key parameter');
        }
        if (!$this->hasParameter($key)) {
            return null;
        }
        return $this->parameters[$key];
    }

    public function getQueryString()
    {
        // TODO: Implement getQueryString() method.
    }
}