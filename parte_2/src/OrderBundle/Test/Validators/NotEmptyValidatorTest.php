<?php

namespace OrderBundle\Validators\Test;

use PHPUnit\Framework\TestCase;
use OrderBundle\Validators\NotEmptyValidator;

class NotEmptyValidatorTest extends TestCase
{
    public function testShouldNotBeValidWhenValueIsEmpty()
    {
        $emptyValue = "";
        $notEmptyValidator = new NotEmptyValidator($emptyValue);

        $isValid = $notEmptyValidator->isValid();

        $this->assertFalse($isValid);
    }

    public function testShouldBeValidWhenValueIsNotEmpty()
    {
        $notEmptyValue = "foo";
        $notEmptyValidator = new NotEmptyValidator($notEmptyValue);

        $isValid = $notEmptyValidator->isValid();

        $this->assertTrue($isValid);
    }
}