<?php

namespace Carminato\GoogleCseBundle\Service\Parser;

use Carminato\GoogleCseBundle\Model\CseApiResultItem;

class JsonCseResponseParser implements CseResponseParserInterface
{
    /**
     * @param $content
     *
     * @return array|null
     */
    public function parseResults($content)
    {
        $decodedContent = json_decode($content, true);

        $items = null;
        if (isset($decodedContent['items'])) {
            foreach ($decodedContent['items'] as $arrayItemProperties) {
                $item = $this->generateCseResultApiItem($arrayItemProperties);

                $items[] = $item;
            }
        }

        return $items;
    }

    /**
     * @param array $itemProperties
     *
     * @return CseApiResultItem
     */
    private function generateCseResultApiItem(array $itemProperties)
    {
        $item = new CseApiResultItem();

        foreach ($itemProperties as $property => $value) {
            $setPropertyMethod = 'set'. ucfirst($property);

            if (method_exists($item, $setPropertyMethod)) {
                $item->$setPropertyMethod($value);
            }
        }

        return $item;
    }
}