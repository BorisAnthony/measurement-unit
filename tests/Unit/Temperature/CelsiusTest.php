<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperationsFloatingPoint\ArithmeticOperationsFloatingPoint;
use PrinsFrank\MeasurementUnit\Temperature\Celsius;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Temperature\Celsius
 */
class CelsiusTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('°C', Celsius::getSymbol());
    }

    /**
     * @covers ::toKelvinValue
     */
    public function testToKelvinValue(): void
    {
        static::assertEqualsWithDelta(0.0, Celsius::toKelvinValue(-273.15, new ArithmeticOperationsFloatingPoint()), 0.01);
        static::assertEqualsWithDelta(77.35, Celsius::toKelvinValue(-195.8, new ArithmeticOperationsFloatingPoint()), 0.01);
        static::assertEqualsWithDelta(195.15, Celsius::toKelvinValue(-78, new ArithmeticOperationsFloatingPoint()), 0.01);
        static::assertEqualsWithDelta(233.15, Celsius::toKelvinValue(-40, new ArithmeticOperationsFloatingPoint()), 0.01);
        static::assertEqualsWithDelta(273.1499, Celsius::toKelvinValue(-0.0001, new ArithmeticOperationsFloatingPoint()), 0.01);
        static::assertEqualsWithDelta(293.15, Celsius::toKelvinValue(20, new ArithmeticOperationsFloatingPoint()), 0.01);
        static::assertEqualsWithDelta(310.15, Celsius::toKelvinValue(37, new ArithmeticOperationsFloatingPoint()), 0.01);
        static::assertEqualsWithDelta(373.1339, Celsius::toKelvinValue(99.9839, new ArithmeticOperationsFloatingPoint()), 0.01);
    }

    /**
     * @covers ::toKelvinValue
     */
    public function testFromKelvinValue(): void
    {
        static::assertEqualsWithDelta(-273.15, Celsius::fromKelvinValue(0.0, new ArithmeticOperationsFloatingPoint()), 0.01);
        static::assertEqualsWithDelta(-195.8, Celsius::fromKelvinValue(77.35, new ArithmeticOperationsFloatingPoint()), 0.01);
        static::assertEqualsWithDelta(-78, Celsius::fromKelvinValue(195.15, new ArithmeticOperationsFloatingPoint()), 0.01);
        static::assertEqualsWithDelta(-40, Celsius::fromKelvinValue(233.15, new ArithmeticOperationsFloatingPoint()), 0.01);
        static::assertEqualsWithDelta(-0.0001, Celsius::fromKelvinValue(273.1499, new ArithmeticOperationsFloatingPoint()), 0.01);
        static::assertEqualsWithDelta(20, Celsius::fromKelvinValue(293.15, new ArithmeticOperationsFloatingPoint()), 0.01);
        static::assertEqualsWithDelta(37, Celsius::fromKelvinValue(310.15, new ArithmeticOperationsFloatingPoint()), 0.01);
        static::assertEqualsWithDelta(99.9839, Celsius::fromKelvinValue(373.1339, new ArithmeticOperationsFloatingPoint()), 0.01);
    }
}
