<?php

namespace Carminato\GoogleCseBundle\Service;

interface ApiResponseInterface {

    public function getResults();

    public function getSearchInformation();

    public function getQueries();
} 