<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Pressure;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\Pressure\PoundPerSquareInch;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Pressure\PoundPerSquareInch
 */
class PoundPerSquareInchTest extends TestCase
{
    /**
     * @covers ::getDefaultSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('psi', PoundPerSquareInch::getDefaultSymbol());
    }

    /**
     * @covers ::fromPascalValue
     */
    public function testFromPascalValue(): void
    {
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $arithmeticOperations->expects(self::once())
            ->method('divide')
            ->with(42.0, 6894.757293168)
            ->willReturn(0.00609156);

        static::assertEquals(
            new PoundPerSquareInch(0.00609156, $arithmeticOperations),
            PoundPerSquareInch::fromPascalValue(42.0, $arithmeticOperations)
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
            ->with(42.0, 6894.757293168)
            ->willReturn(289579.806313056);

        static::assertSame(289579.806313056, (new PoundPerSquareInch(42.0, $arithmeticOperations))->toPascalValue());
    }
}
