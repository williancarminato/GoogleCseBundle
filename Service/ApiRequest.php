<?php

namespace Carminato\GoogleCseBundle\Service;

use Carminato\GoogleCseBundle\Service\Query\ApiQueryInterface;

class ApiRequest implements ApiRequestInterface
{
    private $url;

    private $query;

    public function __construct($url = null, ApiQueryInterface $query = null)
    {
        $this->url = $url;
        $this->query = $query;
    }

    public function getUrl()
    {
        if (empty($this->url)) {
            throw new \UnexpectedValueException('The url attribute is missing.');
        }

        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    public function setQuery(ApiQueryInterface $query)
    {
        $this->query = $query;
    }

    public function getResponse()
    {
        $url = $this->getUrl();
        $query = $this->query->getQueryString();

        $url = $url . '?' . $query;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $result = curl_exec($ch);

        return json_decode($result, true);
    }
}