<?php

namespace OrderBundle\Validators\Test;

use PHPUnit\Framework\TestCase;
use OrderBundle\Validators\NumericValidator;

class NumericValidatorTest extends TestCase
{
    /**
     * @dataProvider valueProvider
     */
    public function testIsValid($value, $expectedResult)
    {
        $numericValidator = new NumericValidator($value);

        $isValid = $numericValidator->isValid();

        $this->assertEquals($expectedResult, $isValid);
    }

    public function valueProvider()
    {
        return [
            'shouldBeValidWhenValueIsANumber' => [
                'value' => 20,
                'expectedResult' => true
            ],
            'shouldBeValidWhenValueIsANumericString' => [
                'value' => '20',
                'expectedResult' => true
            ],
            'shouldNotBeValidWhenValueIsNotANumber' => [
                'value' => 'bla',
                'expectedResult' => false
            ],
            'shouldNotBeValidWhenValueIsEmpty' => [
                'value' => '',
                'expectedResult' => false
            ]
        ];
    }
}