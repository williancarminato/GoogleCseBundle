<?php

namespace Carminato\GoogleCseBundle\Model;

class CseApiResultQueriesBagTest extends \PHPUnit_Framework_TestCase
{
    public function testGetRequestPageWithoutSetRequestShouldReturnNull()
    {
        $queries = new CseApiResultQueriesBag();

        $this->assertNull($queries->getRequestPage());
    }

    public function testGetRequestPageAfterSetRequestShouldSuccess()
    {
        $queryItem = new CseApiResultQueryItem();
        $queries = new CseApiResultQueriesBag();

        $queries->set('request', $queryItem);

        $this->assertSame($queries->getRequestPage(), $queryItem);
    }

    public function testGetNextPageWithoutSetRequestShouldReturnNull()
    {
        $queries = new CseApiResultQueriesBag();

        $this->assertNull($queries->getNextPage());
    }

    public function testGetNextPageAfterSetRequestShouldSuccess()
    {
        $queryItem = new CseApiResultQueryItem();
        $queries = new CseApiResultQueriesBag();

        $queries->set('nextPage', $queryItem);

        $this->assertSame($queries->getNextPage(), $queryItem);
    }

    public function testGetPreviousPageWithoutSetRequestShouldReturnNull()
    {
        $queries = new CseApiResultQueriesBag();

        $this->assertNull($queries->getPreviousPage());
    }

    public function testGetPreviousPageAfterSetRequestShouldSuccess()
    {
        $queryItem = new CseApiResultQueryItem();
        $queries = new CseApiResultQueriesBag();

        $queries->set('previousPage', $queryItem);

        $this->assertSame($queries->getPreviousPage(), $queryItem);
    }
}
 