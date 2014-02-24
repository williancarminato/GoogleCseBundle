<?php

namespace Carminato\GoogleCseBundle\Service;

use Carminato\GoogleCseBundle\Service\Query\ApiQuery;

class ApiRequestTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \UnexpectedValueException
     */
    public function testGetUrlWithNullMustFail()
    {
        $apiRequest = new ApiRequest(null, null);

        $apiRequest->getUrl();
    }

    public function testGetUrlMustPass()
    {
        $cse_url = "https://www.googleapis.com/customsearch/v1";

        $apiRequest = new ApiRequest($cse_url, null);

        $this->assertEquals($cse_url, $apiRequest->getUrl());
    }
}
