<?php

namespace Carminato\GoogleCseBundle\Service\Query;

class ApiQueryTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @expectedException \Carminato\GoogleCseBundle\Service\Query\Exception\MissingApiKeyException
     */
    public function testGetApiKeyWithoutApiKeyValueShouldFail()
    {
        $query = new ApiQuery();

        $query->getApiKey();
    }

    public function testGetApiKeyAfterAddApiKeyValueShouldSuccess()
    {
        $query = new ApiQuery();

        $apiKey = 'Custom Search ApiKey';
        $query->set('key', $apiKey);

        $this->assertEquals($apiKey, $query->getApiKey());
    }

    /**
     * @expectedException \Carminato\GoogleCseBundle\Service\Query\Exception\MissingCustomSearchEngineIdException
     */
    public function testGetCustomSearchEngineIdWithoutCustomSearchEngineIdValueShouldFail()
    {
        $query = new ApiQuery();

        $query->getCustomSearchEngineId();
    }

    public function testGetCustomSearchEngineIdAfterAddCxParameterShouldSuccess()
    {
        $query = new ApiQuery();

        $cxId = 'Custom Search Key Cx Id';
        $query->set('cx', $cxId);

        $this->assertEquals($cxId, $query->getCustomSearchEngineId());
    }

    public function testGetCustomSearchEngineIdAfterAddCrefParameterShouldSuccess()
    {
        $query = new ApiQuery();

        $crefId = 'Custom Search Key Cref Id';
        $query->set('cref', $crefId);

        $this->assertEquals($crefId, $query->getCustomSearchEngineId());
    }

    public function testGetCustomSearchEngineIdAfterAddCxAndCrefParameterShouldReturnCx()
    {
        $query = new ApiQuery();

        $cse_ids = array(
            'cx' => 'Custom Search Key Cx Id',
            'cref' => 'Custom Search Key Cref Id'
        );
        $query->add($cse_ids);

        $this->assertTrue($query->has('cx'));
        $this->assertTrue($query->has('cref'));
        $this->assertEquals($cse_ids['cx'], $query->getCustomSearchEngineId());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetCustomSearchEngineIdWithoutCxAndCrefParameterShouldFail()
    {
        $query = new ApiQuery();

        $cse_ids = array(
            'cxsds' => 'Custom Search Key Cx Id',
            'crefDhs' => 'Custom Search Key Cref Id'
        );
        $query->setCustomSearchEngineId($cse_ids);
    }

    /**
     * @expectedException \Carminato\GoogleCseBundle\Service\Query\Exception\MissingMandatoryParametersException
     */
    public function testGetQueryStringWithoutMandatoryParametersShouldFail()
    {
        $query = new ApiQuery();

        $query->getQueryString();
    }

    /**
     * @covers \Carminato\GoogleCseBundle\Service\Query\ApiQuery::getQueryString
     */
    public function testGetQueryStringAfterAddMandatoryParametersShouldSuccess()
    {
        $query = new ApiQuery();

        $parameters = array(
            'cx' => 'Custom Search Key Cx Id',
            'key' => 'Custom Search ApiKey'
        );
        $query->add($parameters);

        asort($parameters);
        $this->assertEquals(
            http_build_query($parameters), $query->getQueryString()
        );
    }
}
 