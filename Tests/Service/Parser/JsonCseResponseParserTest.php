<?php

namespace Carminato\GoogleCseBundle\Service\Parser;

class JsonCseResponseParserTest extends \PHPUnit_Framework_TestCase
{
    public function testParseResultWithNullContentShouldReturnNull()
    {
        $parser = new JsonCseResponseParser();

        $results = $parser->parseResults(null);

        $this->assertEquals(null, $results);
    }

    public function testParseResultWithCseResponseContentShouldSuccess()
    {
        $parser = new JsonCseResponseParser();

        $content = file_get_contents(__DIR__ . '/../../api_response_files/response_ok_200.json');

        $results = $parser->parseResults($content);

        $this->assertCount(10, $results);
    }
}
 