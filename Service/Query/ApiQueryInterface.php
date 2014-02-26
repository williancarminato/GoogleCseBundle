<?php

namespace Carminato\GoogleCseBundle\Service\Query;

interface ApiQueryInterface
{
    public function getApiKey();

    public function setApiKey($key);

    public function getCustomSearchEngineId();

    public function setCustomSearchEngineId(array $cse);

    public function getQueryString();
} 