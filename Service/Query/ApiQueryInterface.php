<?php

namespace Carminato\GoogleCseBundle\Service\Query;

interface ApiQueryInterface
{
    public function addParameters(array $parameters);

    public function addParameter($key, $value);

    public function removeParameter($key);

    public function hasParameter($key);

    public function getParameter($key);

    public function getQueryString();
} 