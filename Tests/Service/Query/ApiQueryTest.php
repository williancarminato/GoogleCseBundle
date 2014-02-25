<?php

namespace Carminato\GoogleCseBundle\Service\Query;

class ApiQueryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \Carminato\GoogleCseBundle\Service\Query\ApiQuery::addParameter
     */
    public function testAddParameterWithValidInputShouldSuccess(){
        $query = new ApiQuery();
        $className = get_class($query);
        $reflection = new \ReflectionClass($query);
        $reflectionProperty = $reflection->getProperty('parameters');
        $reflectionProperty->setAccessible(true);

        $key = "test_key";
        $value = "Test value";

        $fluent = $query->addParameter($key, $value);

        $propertyValue = $reflectionProperty->getValue($query);
        $this->assertEquals(
            $value, $propertyValue[$key]
        );

        $this->assertInstanceOf($className, $fluent);
    }

    /**
     * @covers \Carminato\GoogleCseBundle\Service\Query\ApiQuery::addParameter
     * @expectedException \InvalidArgumentException
     */
    public function testAddParameterWithoutKeyParameterShouldFail()
    {
        $query = new ApiQuery();
        $query->addParameter(null, 'value');
    }

    /**
     * @covers \Carminato\GoogleCseBundle\Service\Query\ApiQuery::hasParameter
     */
    public function testHasParameterAfterAddParameterWithValueShouldReturnTrue()
    {
        $query = new ApiQuery();
        $validKey = 'test_key';

        $query->addParameter($validKey, 'test_value');
        $this->assertTrue($query->hasParameter($validKey));
    }

    /**
     * @covers \Carminato\GoogleCseBundle\Service\Query\ApiQuery::hasParameter
     */
    public function testHasParameterAfterAddParameterWithoutValueShouldReturnTrue(){
        $query = new ApiQuery();
        $validKey = 'test_key';

        $query->addParameter($validKey, '');
        $this->assertTrue($query->hasParameter($validKey));
    }

    /**
     * @covers \Carminato\GoogleCseBundle\Service\Query\ApiQuery::hasParameter
     */
    public function testHasParameterWithoutAddParameterShouldReturnFalse(){
        $query = new ApiQuery();
        $invalidKey = 'test_key';

        $this->assertFalse($query->hasParameter($invalidKey));
    }

    /**
     * @covers \Carminato\GoogleCseBundle\Service\Query\ApiQuery::hasParameter
     * @expectedException \InvalidArgumentException
     */
    public function testHasParameterWithInvalidParameter()
    {
        $query = new ApiQuery();
        $query->hasParameter(null);
    }

    /**
     * @covers \Carminato\GoogleCseBundle\Service\Query\ApiQuery::hasParameter
     * @expectedException \PHPUnit_Framework_Error
     */
    public function testHasParameterWithoutParameter()
    {
        $query = new ApiQuery();

        $query->hasParameter();

    }

    /**
     * @covers \Carminato\GoogleCseBundle\Service\Query\ApiQuery::getParameter
     */
    public function testGetParameterAfterAddParameterShouldSuccess()
    {
        $query = new ApiQuery();
        $key = 'test_key';
        $value = uniqid();
        $query->addParameter($key, $value);

        $this->assertEquals($value, $query->getParameter($key));
    }

    /**
     * @covers \Carminato\GoogleCseBundle\Service\Query\ApiQuery::getParameter
     */
    public function testGetParameterWithoutAddParameterShouldReturnNull(){
        $query = new ApiQuery();
        $this->assertNull($query->getParameter('test'));
    }

    /**
     * @covers \Carminato\GoogleCseBundle\Service\Query\ApiQuery::getParameter
     * @expectedException \PHPUnit_Framework_Error
     */
    public function testGetParameterWithoutParameterShouldFail(){
        $query = new ApiQuery();
        $query->getParameter();
    }

    /**
     * @covers \Carminato\GoogleCseBundle\Service\Query\ApiQuery::getParameter
     * @expectedException \InvalidArgumentException
     */
    public function testGetParameterInvalidParameterShouldFail(){
        $query = new ApiQuery();
        $query->getParameter(null);
    }

    /**
     * @covers \Carminato\GoogleCseBundle\Service\Query\ApiQuery::removeParameter
     * @depends testAddParameterWithValidInputShouldSuccess
     */
    public function testRemoveParameterAfterAddParameterShouldSuccess()
    {
        $query = new ApiQuery();
        $key = 'test_key';
        $value = 'test_value';
        $query->addParameter($key, $value);

        $this->assertTrue($query->hasParameter($key));

        $fluent = $query->removeParameter($key);

        $this->assertFalse($query->hasParameter($key));
        $this->assertInstanceOf(get_class($query), $fluent);
    }

    /**
     * @covers \Carminato\GoogleCseBundle\Service\Query\ApiQuery::removeParameter
     */
    public function testRemoveParameterWithNonExistentKeyShouldSuccess()
    {
        $query = new ApiQuery();
        $key = 'test_key';

        $this->assertFalse($query->hasParameter($key));

        $fluent = $query->removeParameter($key);

        $this->assertFalse($query->hasParameter($key));
        $this->assertInstanceOf(get_class($query), $fluent);
    }

    /**
     * @covers \Carminato\GoogleCseBundle\Service\Query\ApiQuery::removeParameter
     * @expectedException \PHPUnit_Framework_Error
     */
    public function testRemoveParameterWithoutParameterShouldFail(){
        $query = new ApiQuery();
        $query->removeParameter();
    }

    /**
     * @covers \Carminato\GoogleCseBundle\Service\Query\ApiQuery::removeParameter
     * @expectedException \InvalidArgumentException
     */
    public function testRemoveParameterInvalidParameterShouldFail(){
        $query = new ApiQuery();
        $query->removeParameter(null);
    }

    /**
     * @covers \Carminato\GoogleCseBundle\Service\Query\ApiQuery::addParameters
     */
    public function testAddParametersWithSimpleArrayShouldSuccess()
    {
        $query = new ApiQuery();

        $parameters = array(
            'parameter1' => 'value 1',
            'parameter2' => 'value 2',
            'parameter3' => 'value 3'
        );

        $fluent = $query->addParameters($parameters);

        $this->assertEquals(
            $parameters['parameter1'], $query->getParameter('parameter1')
        );
        $this->assertEquals(
            $parameters['parameter2'], $query->getParameter('parameter2')
        );
        $this->assertEquals(
            $parameters['parameter3'], $query->getParameter('parameter3')
        );
        $this->assertInstanceOf(get_class($query), $fluent);
    }

    /**
     * @covers \Carminato\GoogleCseBundle\Service\Query\ApiQuery::addParameters
     */
    public function testAddParametersWithArrayObjectShouldSuccess()
    {
        $query = new ApiQuery();

        $parameters = array(
            'parameter1' => 'value 1',
            'parameter2' => 'value 2',
            'parameter3' => 'value 3'
        );
        $parameterObject = new \ArrayObject($parameters);

        $query->addParameters($parameters);

        $this->assertEquals(
            $parameterObject->offsetGet('parameter1'),
            $query->getParameter('parameter1')
        );
    }

    /**
     * @covers \Carminato\GoogleCseBundle\Service\Query\ApiQuery::addParameters
     */
    public function testAddParametersWithExistentParametersShouldOverridesParameterAndMerge(){
        $query = new ApiQuery();
        $value1 = 'value to override';
        $value2 = 'value 2';
        $query->addParameter('parameter1', $value1);
        $query->addParameter('parameter2', $value2);

        $parameters = array(
            'parameter1' => 'value 1',
            'parameter3' => 'value 3',
            'parameter4' => 'value 4'
        );

        $fluent = $query->addParameters($parameters);

        $this->assertEquals(
            $parameters['parameter1'], $query->getParameter('parameter1')
        );
        $this->assertEquals(
            $value2, $query->getParameter('parameter2')
        );
        $this->assertEquals(
            $parameters['parameter4'], $query->getParameter('parameter4')
        );
        $this->assertInstanceOf(get_class($query), $fluent);
    }

    /**
     * @covers \Carminato\GoogleCseBundle\Service\Query\ApiQuery::addParameters
     * @expectedException \PHPUnit_Framework_Error
     */
    public function testaddParametersWithInvalidParameterShouldFail(){
        $query = new ApiQuery();
        $query->addParameters(null);
    }

    /**
     * @covers \Carminato\GoogleCseBundle\Service\Query\ApiQuery::addParameters
     * @expectedException \PHPUnit_Framework_Error
     */
    public function testaddParametersWithoutParameterShouldFail(){
        $query = new ApiQuery();
        $query->addParameters(null);
    }

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
        $query->addParameters($parameters);

        asort($parameters);
        $this->assertEquals(
            http_build_query($parameters), $query->getQueryString()
        );
    }
}
 