<?php

use PHPUnit\Framework\TestCase;

class SayHelloArgumentWrapperTest extends TestCase
{
    /**
     * @dataProvider negativeDataProvider
     */
    public function testNegative($arg)
    {
        $this->expectException(InvalidArgumentException::class);

        sayHelloArgumentWrapper($arg);
    }

    public function negativeDataProvider() {
        return [
            [[1, 2]],
            [null]
        ];
    }
}
