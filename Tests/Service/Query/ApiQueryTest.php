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
}
 