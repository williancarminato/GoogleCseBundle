<?php

namespace Carminato\GoogleCseBundle\Service\Query;

use Symfony\Component\HttpFoundation\ParameterBag;

interface ApiQueryInterface
{
    public function setParameter(ParameterBag $parameters);

    public function addParameter($key, $value);
} 