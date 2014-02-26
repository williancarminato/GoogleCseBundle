<?php

namespace Carminato\GoogleCseBundle\Service\Parser;


class JsonCseResponseParser implements CseResponseParserInterface
{
    public function parseResults($content)
    {
        $decodedContent = json_decode($content, true);

        $items = null;
        if (isset($decodedContent['items'])) {
            foreach ($decodedContent['items'] as $item) {
                $items[] = $item;
            }
        }

        return $items;
    }
}