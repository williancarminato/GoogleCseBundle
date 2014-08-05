<?php

namespace Carminato\GoogleCseBundle\Model;

class CseApiResultSearchInformation implements CseApiResultInterface
{
    private $searchTime;

    private $totalResults;

    function __construct($searchTime, $totalResults)
    {
        $this->searchTime = $searchTime;
        $this->totalResults = $totalResults;
    }

    /**
     * @param mixed $searchTime
     */
    public function setSearchTime($searchTime)
    {
        $this->searchTime = $searchTime;
    }

    /**
     * @return mixed
     */
    public function getSearchTime()
    {
        return $this->searchTime;
    }

    /**
     * @param mixed $totalResults
     */
    public function setTotalResults($totalResults)
    {
        $this->totalResults = $totalResults;
    }

    /**
     * @return mixed
     */
    public function getTotalResults()
    {
        return $this->totalResults;
    }
} 