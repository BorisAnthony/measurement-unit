<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Length;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\Length\Millimeter;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Length\Millimeter
 */
class MillimeterTest extends TestCase
{
    /**
     * @covers ::getDefaultSymbol
     */
    public function testgetDefaultSymbol(): void
    {
        static::assertSame('mm', Millimeter::getDefaultSymbol());
    }

    /**
     * @covers ::fromMeterValue
     */
    public function testFromMeterValue(): void
    {
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $arithmeticOperations->expects(self::once())
            ->method('divide')
            ->with(42.0, 0.001)
            ->willReturn(42000.0);

        static::assertEquals(
            new Millimeter(42000.0, $arithmeticOperations),
            Millimeter::fromMeterValue(42.0, $arithmeticOperations)
        );
    }

    /**
     * @covers ::toMeterValue
     */
    public function testToMeterValue(): void
    {
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $arithmeticOperations->expects(self::once())
            ->method('multiply')
            ->with(42.0, 0.001)
            ->willReturn(0.042);

        static::assertSame(0.042, (new Millimeter(42.0, $arithmeticOperations))->toMeterValue());
    }
}
