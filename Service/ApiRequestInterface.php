<?php

namespace Carminato\GoogleCseBundle\Service;

use Carminato\GoogleCseBundle\Service\Query\ApiQueryInterface;

interface ApiRequestInterface
{
    public function getUrl();

    public function setUrl($url);

    public function setQuery(ApiQueryInterface $query);

    public function getResponse($format = 'json');
}
