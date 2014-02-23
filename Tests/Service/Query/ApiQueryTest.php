<?php

namespace Carminato\GoogleCseBundle\Service\Query;


class ApiQueryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \Carminato\GoogleCseBundle\Service\Query\ApiQuery::addParameter
     */
    public function testAddParameterWithValidInputShouldSuccess(){
        $query = new ApiQuery();

        $reflection = new \ReflectionClass($query);
        $reflectionProperty = $reflection->getProperty('parameters');
        $reflectionProperty->setAccessible(true);

        $key = "test_key";
        $value = "Test value";

        $query->addParameter($key, $value);

        $propertyValue = $reflectionProperty->getValue($query);
        $this->assertEquals(
            $value, $propertyValue[$key]
        );
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

}
 