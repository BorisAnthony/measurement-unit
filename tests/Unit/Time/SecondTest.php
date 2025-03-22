<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Time;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\Time\Second;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Time\Second
 */
class SecondTest extends TestCase
{
    /**
     * @covers ::getDefaultSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('s', Second::getDefaultSymbol());
    }

    /**
     * @covers ::fromSecondValue
     */
    public function testFromSecondValue(): void
    {
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);

        static::assertEquals(
            new Second(42.0, $arithmeticOperations),
            Second::fromSecondValue(42.0, $arithmeticOperations)
        );
    }

    /**
     * @covers ::toSecondValue
     */
    public function testToSecondValue(): void
    {
        static::assertSame(42.0, (new Second(42.0, $this->createMock(ArithmeticOperations::class)))->toSecondValue());
    }
}
