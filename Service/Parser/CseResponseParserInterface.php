<?php

namespace Carminato\GoogleCseBundle\Service\Parser;

interface CseResponseParserInterface
{
    public function parseResults($content);
} 