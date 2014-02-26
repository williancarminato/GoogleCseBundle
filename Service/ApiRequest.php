<?php

namespace Carminato\GoogleCseBundle\Service;

use Carminato\GoogleCseBundle\Service\Parser\JsonCseResponseParser;
use Carminato\GoogleCseBundle\Service\Query\ApiQueryInterface;
use Carminato\GoogleCseBundle\Service\Query\Exception\MissingApiQueryException;

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

    public function getQuery()
    {
        if (empty($this->query)) {
            throw new MissingApiQueryException();
        }

        return $this->query;
    }

    public function setQuery(ApiQueryInterface $query)
    {
        $this->query = $query;
    }

    /**
     * @param string $format
     *
     * @return ApiResponse
     * @throws \InvalidArgumentException
     */
    public function getResponse($format = 'json')
    {
        $url = $this->getUrl();
        $query = $this->getQuery()->getQueryString();

        $url = $url . '?' . $query;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $result = curl_exec($ch);

        switch ($format) {
            case 'json':
                return new ApiResponse($result, new JsonCseResponseParser());
                break;
            default:
                throw new \InvalidArgumentException('Supported formats are json and atom');
        }
    }
}