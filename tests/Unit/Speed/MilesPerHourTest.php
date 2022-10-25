<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Speed;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\Speed\MilesPerHour;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Speed\MilesPerHour
 */
class MilesPerHourTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('mph', MilesPerHour::getSymbol());
    }

    /**
     * @covers ::fromMeterPerSecondValue
     */
    public function testFromMeterPerSecondValue(): void
    {
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $arithmeticOperations->expects(self::once())
            ->method('divide')
            ->with(42.0, 0.44704)
            ->willReturn(93.9513242663);

        static::assertSame(93.9513242663, MilesPerHour::fromMeterPerSecondValue(42.0, $arithmeticOperations));
    }

    /**
     * @covers ::toMeterPerSecondValue
     */
    public function testToMeterPerSecondValue(): void
    {
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $arithmeticOperations->expects(self::once())
            ->method('multiply')
            ->with(42.0, 0.44704)
            ->willReturn(18.77568);

        static::assertSame(18.77568, MilesPerHour::toMeterPerSecondValue(42.0, $arithmeticOperations));
    }
}
