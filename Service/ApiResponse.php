<?php

namespace Carminato\GoogleCseBundle\Service;

use Carminato\GoogleCseBundle\Model\CseApiResultQueriesBag;
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

    /**
     * @return CseApiResultQueriesBag
     */
    public function getQueries()
    {
        return $this->parser->parseQueries($this->content);
    }

    public function getErrors()
    {
        return $this->parser->parseError($this->content);
    }
}