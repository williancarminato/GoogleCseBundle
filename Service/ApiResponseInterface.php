<?php

namespace Carminato\GoogleCseBundle\Service;

interface ApiResponseInterface {

    public function getResults();

    public function getPromotions();

    public function getUrl();

    public function getRaw();

    public function getQueries();
} 