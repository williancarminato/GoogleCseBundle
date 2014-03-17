<?php

namespace Carminato\GoogleCseBundle\Service\Parser;

use Carminato\GoogleCseBundle\Model\CseApiResultInterface;
use Carminato\GoogleCseBundle\Model\CseApiResultItem;
use Carminato\GoogleCseBundle\Model\CseApiResultQueriesBag;
use Carminato\GoogleCseBundle\Model\CseApiResultQuery;
use Carminato\GoogleCseBundle\Model\CseApiResultQueryItem;

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
                $item = $this->generateCseApiResult(
                    $arrayItemProperties,
                    new CseApiResultItem()
                );

                $items[] = $item;
            }
        }

        return $items;
    }

    /**
     * @param array                                         $itemProperties
     * @param \Carminato\GoogleCseBundle\Model\CseApiResultInterface $cseApiResultClass
     *
     * @return CseApiResultInterface
     */
    private function generateCseApiResult(array $itemProperties, CseApiResultInterface $cseApiResultClass)
    {
        $item = clone $cseApiResultClass;

        foreach ($itemProperties as $property => $value) {
            $setPropertyMethod = 'set'. ucfirst($property);

            if (method_exists($item, $setPropertyMethod)) {
                $item->$setPropertyMethod($value);
            }
        }

        return $item;
    }

    /**
     * @param $content
     *
     * @return CseApiResultQueriesBag
     */
    public function parseQueries($content)
    {
        $decodedContent = json_decode($content, true);

        $queries = new CseApiResultQueriesBag();
        if (isset($decodedContent['queries'])) {
            foreach ($decodedContent['queries'] as $queryName => $arrayQueryProperties) {
                $query = $this->generateCseApiResult(
                    $arrayQueryProperties[0],
                    new CseApiResultQueryItem()
                );

                $queries->set($queryName, $query);
            }
        }

        return $queries;
    }
}