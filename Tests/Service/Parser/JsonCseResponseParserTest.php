<?php

namespace Carminato\GoogleCseBundle\Service\Parser;

class JsonCseResponseParserTest extends \PHPUnit_Framework_TestCase
{
    private $okResponse;

    private $errorResponse;

    public function setUp()
    {
        $this->okResponse = file_get_contents(__DIR__ . '/../../api_response_files/response_ok_200.json');
        $this->errorResponse = file_get_contents(__DIR__ . '/../../api_response_files/error_400.json');
    }

    public function testParseResultWithNullContentShouldReturnNull()
    {
        $parser = new JsonCseResponseParser();

        $results = $parser->parseResults(null);

        $this->assertEquals(null, $results);
    }

    public function testParseResultWithCseResponseContentShouldSuccess()
    {
        $parser = new JsonCseResponseParser();

        $results = $parser->parseResults($this->okResponse);

        $this->assertCount(10, $results);
        $this->assertInternalType('array', $results);
    }

    public function testParseQueriesWithCseResponseContentShouldSuccess()
    {
        $parser = new JsonCseResponseParser();

        $queries = $parser->parseQueries($this->okResponse);

        $this->assertCount(3, $queries);
        $this->assertInstanceOf('\Carminato\GoogleCseBundle\Model\CseApiResultQueriesBag', $queries);
    }

    public function testParseErrorWithCseResponseOkShouldBeNull()
    {
        $parser = new JsonCseResponseParser();

        $error = $parser->parseError($this->okResponse);

        $this->assertNull($error);
    }

    public function testParseErrorWithCseErrorResponseShouldReturnApiError()
    {
        $parser = new JsonCseResponseParser();

        $error = $parser->parseError($this->errorResponse);

        $this->assertInstanceOf('\Carminato\GoogleCseBundle\Service\ApiError', $error);
    }
}
 