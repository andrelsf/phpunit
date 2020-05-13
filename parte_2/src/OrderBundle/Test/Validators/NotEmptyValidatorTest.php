<?php

namespace OrderBundle\Validators\Test;

use PHPUnit\Framework\TestCase;
use OrderBundle\Validators\NotEmptyValidator;

class NotEmptyValidatorTest extends TestCase
{
    /**
     * @dataProvider valueProvider
     */
    public function testIsValid($value, $expectedResult)
    {
        $notEmptyValidator = new NotEmptyValidator($value);

        $isValid = $notEmptyValidator->isValid();

        $this->assertEquals($expectedResult, $isValid);          
    }

    public function valueProvider()
    {
        return [
            'shouldBeValidWhenValueIsNotEmpty' => [
                'value' => 'foo', 
                'expectedResult' => true
            ],
            'shouldNotBeValidWhenValueIsEmpty' => [
                'value' => '', 
                'expectedResult' => false
            ]
        ];
    }

}