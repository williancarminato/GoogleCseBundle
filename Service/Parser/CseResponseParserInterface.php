<?php

namespace Carminato\GoogleCseBundle\Service\Parser;

interface CseResponseParserInterface
{
    public function parseResults($content);

    public function parseQueries($content);

    public function parseError($content);

    public function parseSearchInformation($content);
}