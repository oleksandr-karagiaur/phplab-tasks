<?php


use PHPUnit\Framework\TestCase;

class SayHelloArgumentTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     */
    public function testPositive($arg, $expected)
    {
        $this->assertEquals($expected, sayHelloArgument($arg));
    }

    public function positiveDataProvider()
    {
        return [
            ['everybody here', 'Hello everybody here'],
            ['5', 'Hello 5'],
            ['3.54', 'Hello 3.54'],
            ['-0.84', 'Hello -0.84'],
            [true, 'Hello 1'],
            [false, 'Hello ']
        ];
    }
}
