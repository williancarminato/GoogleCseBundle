<?php

namespace Carminato\GoogleCseBundle\Service\Query;

use Carminato\GoogleCseBundle\Service\Query\Exception\MissingApiKeyException;
use Carminato\GoogleCseBundle\Service\Query\Exception\MissingCustomSearchEngineIdException;
use Carminato\GoogleCseBundle\Service\Query\Exception\MissingMandatoryParametersException;
use Symfony\Component\HttpFoundation\ParameterBag;

class ApiQuery extends ParameterBag implements ApiQueryInterface
{
    /**
     * @param array $parameters
     * @return $this
     */
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

    /**
     * @param string $key
     * @return $this
     * @throws \InvalidArgumentException
     */
    public function removeParameter($key)
    {
        if (empty($key)) {
            throw new \InvalidArgumentException('Missing $key parameter');
        }
        unset($this->parameters[$key]);

        return $this;
    }

    /**
     * @param string $key
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

    /**
     * @param string $key
     * @return mixed
     * @throws \InvalidArgumentException
     */
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

    /**
     * @throws Exception\MissingMandatoryParametersException
     * @return string
     */
    public function getQueryString()
    {
        if (!$this->has('key') || (!$this->has('cx') && !$this->has('cref'))) {
            throw new MissingMandatoryParametersException();
        }

        asort($this->parameters);

        return http_build_query($this->parameters);
    }

    /**
     * @return mixed
     * @throws Exception\MissingApiKeyException
     */
    public function getApiKey()
    {
        if (!$this->has('key')) {
            throw new MissingApiKeyException();
        }

        return $this->get('key');
    }

    /**
     * @param $key
     *
     * @return $this
     */
    public function setApiKey($key)
    {
        $this->set('key', $key);

        return $this;
    }

    /**
     * @return mixed
     * @throws Exception\MissingCustomSearchEngineIdException
     */
    public function getCustomSearchEngineId()
    {
        if (!$this->has('cx') && !$this->has('cref')) {
            throw new MissingCustomSearchEngineIdException();
        }

        if ($this->has('cx')) {
            return $this->get('cx');
        }

        return $this->get('cref');
    }

    /**
     * @param array $cse
     *
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setCustomSearchEngineId(array $cse)
    {
        if (!array_key_exists('cx', $cse) && !array_key_exists('cref', $cse)) {
            throw new \InvalidArgumentException('You must provide cx or cref id');
        }

        $this->add($cse);

        return $this;
    }
}