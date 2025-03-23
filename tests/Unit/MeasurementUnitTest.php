<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\MeasurementUnit;
use PrinsFrank\MeasurementUnit\MeasurementUnitInterface;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\MeasurementUnit
 */
class MeasurementUnitTest extends TestCase
{
    /**
     * @covers ::getValue
     */
    public function testGetValue(): void
    {
        $unit = new class (42.0) extends MeasurementUnit {
            public static function getSymbol(): string
            {
                return 'unit';
            }
        };

        static::assertSame(42.0, $unit->getValue());
    }

    /**
     * @covers ::getInstanceSymbol
     */
    public function testGetInstanceSymbol(): void
    {
        $unit = new class (42.0) extends MeasurementUnit {
            public static function getSymbol(): string
            {
                return 'unit';
            }
        };

        static::assertSame('unit', $unit->getInstanceSymbol());

        $unitWithCustomSymbol = new class (42.0, null, 'custom') extends MeasurementUnit {
            public static function getSymbol(): string
            {
                return 'unit';
            }
        };

        static::assertSame('custom', $unitWithCustomSymbol->getInstanceSymbol());
    }

    /**
     * @covers ::setInstanceSymbol
     */
    public function testSetInstanceSymbol(): void
    {
        $unit = new class (42.0) extends MeasurementUnit {
            public static function getSymbol(): string
            {
                return 'unit';
            }
        };

        static::assertSame('customSymbol', $unit->setInstanceSymbol('customSymbol'));
        static::assertSame('customSymbol', $unit->getInstanceSymbol());
    }

    /**
     * @covers ::setSymbol
     */
    public function testSetSymbol(): void
    {
        $unitClass = new class (42.0) extends MeasurementUnit {
            public static function getSymbol(): string
            {
                return static::$defaultSymbol;
            }
        };

        $className      = get_class($unitClass);
        $originalSymbol = $className::getSymbol();

        static::assertSame('newSymbol', $className::setSymbol('newSymbol'));
        static::assertSame('newSymbol', $className::getSymbol());

        // Reset to original value to avoid affecting other tests
        $className::setSymbol($originalSymbol);
    }

    /**
     * @covers ::setSymbol
     * @covers ::getSymbol
     * @covers ::getInstanceSymbol
     */
    public function testSetSymbolAffectsNewInstances(): void
    {
        // Define a test measurement unit class
        $unitClass = new class (0.0) extends MeasurementUnit {
            public static function getSymbol(): string
            {
                return static::$defaultSymbol;
            }
        };

        $className      = get_class($unitClass);
        $originalSymbol = $className::getSymbol();

        // Change the default symbol
        $className::setSymbol('changedSymbol');

        // Verify static method returns updated symbol
        static::assertSame('changedSymbol', $className::getSymbol());

        // Create a new instance and verify it uses the updated symbol
        $newInstance = new $className(42.0);
        static::assertSame('changedSymbol', $newInstance->getInstanceSymbol());

        // Reset to original value to avoid affecting other tests
        $className::setSymbol($originalSymbol);
    }
}
