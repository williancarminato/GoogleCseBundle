<?php

namespace Carminato\GoogleCseBundle\Service;

class ApiRequestTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \UnexpectedValueException
     */
    public function testGetUrlWithNullMustFail()
    {
        $apiRequest = new ApiRequest();

        $apiRequest->getUrl();
    }

    public function testGetUrlMustPass()
    {
        $cse_url = "https://www.googleapis.com/customsearch/v1";

        $apiRequest = new ApiRequest($cse_url);

        $this->assertEquals($cse_url, $apiRequest->getUrl());
    }

    /**
     * @expectedException \Carminato\GoogleCseBundle\Service\Query\Exception\MissingApiQueryException
     */
    public function testGetResponseWithoutQueryMustFail()
    {
        $cse_url = "https://www.googleapis.com/customsearch/v1";

        $apiRequest = new ApiRequest($cse_url);

        $apiRequest->getResponse();
    }
}
