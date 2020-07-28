<?php

use PHPUnit\Framework\TestCase;

class CountArgumentsTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     */
    public function testPositive($expected, $arg)
    {
        $this->assertEquals($expected, countArguments(...$arg));
    }

    public function positiveDataProvider()
    {
        return [
            [['argument_count' => 0, 'argument_values' => []], []],
            [['argument_count' => 2, 'argument_values' => ['hi', 2]], ['hi', 2]],
            [['argument_count' => 3, 'argument_values' => ['hi', 'there', 5]], ['hi', 'there', 5]]
        ];
    }
}
/* alter
use PHPUnit\Framework\TestCase;

class CountArgumentsTest extends TestCase
{
    public function testPositive()
    {
        $this->assertEquals(['argument_count' => 0, 'argument_values' => []], countArguments());
        $this->assertEquals(['argument_count' => 1, 'argument_values' => ['hi']], countArguments('hi'));
        $this->assertEquals(['argument_count' => 2, 'argument_values' => ['hi', 'there']], countArguments('hi', 'there'));
    }
}
*/