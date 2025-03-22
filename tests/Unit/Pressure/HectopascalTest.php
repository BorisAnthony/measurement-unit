<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Pressure;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\Pressure\Hectopascal;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Pressure\Hectopascal
 */
class HectopascalTest extends TestCase
{
    /**
     * @covers ::getDefaultSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('hPa', Hectopascal::getDefaultSymbol());
    }

    /**
     * @covers ::fromPascalValue
     */
    public function testFromPascalValue(): void
    {
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $arithmeticOperations->expects(self::once())
            ->method('divide')
            ->with(42.0, 100)
            ->willReturn(0.42);

        static::assertEquals(
            new Hectopascal(0.42, $arithmeticOperations),
            Hectopascal::fromPascalValue(42.0, $arithmeticOperations)
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
            ->with(42.0, 100)
            ->willReturn(4200.0);

        static::assertSame(4200.0, (new Hectopascal(42.0, $arithmeticOperations))->toPascalValue());
    }
}
