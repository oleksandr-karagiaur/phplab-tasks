<?php


use PHPUnit\Framework\TestCase;

class CountArgumentsWrapperTest extends TestCase
{
    /**
     * @dataProvider negativeDataProvider
     */
    public function testNegative($arg)
    {
        $this->expectException(InvalidArgumentException::class);

        countArgumentsWrapper(...$arg);
    }

    public function negativeDataProvider() {
        return [
            [[1, 'f']],
            [[null, true]]
        ];
    }
}
