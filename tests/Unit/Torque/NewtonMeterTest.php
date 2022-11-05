<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Torque;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\Torque\NewtonMeter;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Torque\NewtonMeter
 */
class NewtonMeterTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('N⋅m', NewtonMeter::getSymbol());
    }

    /**
     * @covers ::fromNewtonMeterValue
     */
    public function testFromNewtonMeter(): void
    {
        static::assertSame(42.0, NewtonMeter::fromNewtonMeterValue(42.0, $this->createMock(ArithmeticOperations::class)));
    }

    /**
     * @covers ::toNewtonMeterValue
     */
    public function testToNewtonMeter(): void
    {
        static::assertSame(42.0, NewtonMeter::toNewtonMeterValue(42.0, $this->createMock(ArithmeticOperations::class)));
    }
}
