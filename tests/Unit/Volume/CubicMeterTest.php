<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Volume;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\Volume\CubicMeter;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Volume\CubicMeter
 */
class CubicMeterTest extends TestCase
{
    /**
     * @covers ::getDefaultSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('m³', CubicMeter::getDefaultSymbol());
    }

    /**
     * @covers ::fromCubicMeterValue
     */
    public function testFromCubicMeterValue(): void
    {
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);

        static::assertEquals(
            new CubicMeter(42.0, $arithmeticOperations),
            CubicMeter::fromCubicMeterValue(42.0, $arithmeticOperations)
        );
    }

    /**
     * @covers ::toCubicMeterValue
     */
    public function testToCubicMeterValue(): void
    {
        static::assertSame(42.0, (new CubicMeter(42.0, $this->createMock(ArithmeticOperations::class)))->toCubicMeterValue());
    }
}
