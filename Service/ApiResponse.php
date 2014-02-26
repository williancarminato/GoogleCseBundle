<?php

namespace Carminato\GoogleCseBundle\Service;

use Carminato\GoogleCseBundle\Service\Parser\CseResponseParserInterface;

class ApiResponse implements ApiResponseInterface
{
    private $content;

    private $parser;

    public function __construct($content, CseResponseParserInterface $parser)
    {
        $this->content = $content;
        $this->parser = $parser;
    }

    /**
     * @return array
     */
    public function getResults()
    {
        return $this->parser->parseResults($this->content);
    }

    public function getPromotions()
    {
        // TODO: Implement getPromotions() method.
    }

    public function getUrl()
    {
        // TODO: Implement getUrl() method.
    }

    public function getRaw()
    {
        // TODO: Implement getRaw() method.
    }

    public function getQueries()
    {
        // TODO: Implement getQueries() method.
    }
}