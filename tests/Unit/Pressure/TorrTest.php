<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Pressure;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\Pressure\Torr;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Pressure\Torr
 */
class TorrTest extends TestCase
{
    /**
     * @covers ::getDefaultSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('Torr', Torr::getDefaultSymbol());
    }

    /**
     * @covers ::fromPascalValue
     */
    public function testFromPascalValue(): void
    {
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $arithmeticOperations->expects(self::once())
            ->method('divide')
            ->with(42.0, 133.322368421)
            ->willReturn(0.315029);

        static::assertEquals(
            new Torr(0.315029, $arithmeticOperations),
            Torr::fromPascalValue(42.0, $arithmeticOperations)
        );
    }

    /**
     * @covers ::toPascalValue
     */
    public function testToPascalValue(): void
    {
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $arithmeticOperations->expects(self::once())
            ->method('multiply')
            ->with(42.0, 133.322368421)
            ->willReturn(5599.53947368);

        static::assertSame(5599.53947368, (new Torr(42.0, $arithmeticOperations))->toPascalValue());
    }
}
