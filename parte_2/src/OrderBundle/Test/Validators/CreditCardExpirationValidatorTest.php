<?php

namespace OrderBundle\Validators\Test;

use DateTime;
use OrderBundle\Validators\CreditCardExpirationValidator;
use PHPUnit\Framework\TestCase;

class CreditCardExpirationValidatorTest extends TestCase
{
    /**
     * @dataProvider valueProvider
     */
    public function testIsValid($value, $expectedResult)
    {
        $creditCardExpirationDate = new DateTime($value);

        $creditCardExpirationValidator = new CreditCardExpirationValidator($creditCardExpirationDate);
        $isValid = $creditCardExpirationValidator->isValid();

        $this->assertEquals($expectedResult, $isValid);
    }


    public function valueProvider()
    {
        return [
            'shouldBeValidWhenDateIsNotExpired' => [
                'valeu' => '9999-01-01',
                'expectedResult' => true
            ],
            'shouldNotBeValidWhenDateIsExpired' => [
                'value' => '2000-01-01',
                'expectedResult' => false
            ]
        ];
    }
}