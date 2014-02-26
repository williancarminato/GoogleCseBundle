<?php

namespace Carminato\GoogleCseBundle\Service\Query;

use Carminato\GoogleCseBundle\Service\Query\Exception\MissingApiKeyException;
use Carminato\GoogleCseBundle\Service\Query\Exception\MissingCustomSearchEngineIdException;
use Carminato\GoogleCseBundle\Service\Query\Exception\MissingMandatoryParametersException;
use Symfony\Component\HttpFoundation\ParameterBag;

class ApiQuery extends ParameterBag implements ApiQueryInterface
{
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