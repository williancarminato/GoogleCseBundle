<?php

namespace Carminato\GoogleCseBundle\Model;

class CseApiResultQueryItem implements CseApiResultInterface
{
    /**
     * @var integer
     */
    private $count;

    /**
     * @var string
     */
    private $cx;

    /**
     * @var string
     */
    private $inputEncoding;

    /**
     * @var string
     */
    private $outputEncoding;

    /**
     * @var string
     */
    private $safe;

    /**
     * @var string
     */
    private $searchTerms;

    /**
     * @var integer
     */
    private $startIndex;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $totalResults;

    /**
     * @param int $count
     */
    public function setCount($count)
    {
        $this->count = $count;
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @param string $cx
     */
    public function setCx($cx)
    {
        $this->cx = $cx;
    }

    /**
     * @return string
     */
    public function getCx()
    {
        return $this->cx;
    }

    /**
     * @param string $inputEncoding
     */
    public function setInputEncoding($inputEncoding)
    {
        $this->inputEncoding = $inputEncoding;
    }

    /**
     * @return string
     */
    public function getInputEncoding()
    {
        return $this->inputEncoding;
    }

    /**
     * @param string $outputEncoding
     */
    public function setOutputEncoding($outputEncoding)
    {
        $this->outputEncoding = $outputEncoding;
    }

    /**
     * @return string
     */
    public function getOutputEncoding()
    {
        return $this->outputEncoding;
    }

    /**
     * @param string $safe
     */
    public function setSafe($safe)
    {
        $this->safe = $safe;
    }

    /**
     * @return string
     */
    public function getSafe()
    {
        return $this->safe;
    }

    /**
     * @param string $searchTerms
     */
    public function setSearchTerms($searchTerms)
    {
        $this->searchTerms = $searchTerms;
    }

    /**
     * @return string
     */
    public function getSearchTerms()
    {
        return $this->searchTerms;
    }

    /**
     * @param int $startIndex
     */
    public function setStartIndex($startIndex)
    {
        $this->startIndex = $startIndex;
    }

    /**
     * @return int
     */
    public function getStartIndex()
    {
        return $this->startIndex;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $totalResults
     */
    public function setTotalResults($totalResults)
    {
        $this->totalResults = $totalResults;
    }

    /**
     * @return string
     */
    public function getTotalResults()
    {
        return $this->totalResults;
    }
}