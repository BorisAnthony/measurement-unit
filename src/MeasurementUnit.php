<?php

declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\ArithmeticOperationsFloatingPoint\ArithmeticOperationsFloatingPoint;

/**
 * @property-read ArithmeticOperations $arithmeticOperations The arithmetic operations implementation, never null after constructor
 */
abstract class MeasurementUnit implements MeasurementUnitInterface
{
    protected static string $defaultSymbol = 'unit';

    protected string $symbol;

    public function __construct(
        public readonly float $value,
        public ?ArithmeticOperations $arithmeticOperations = null,
        ?string $symbol = null
    ) {
        $this->arithmeticOperations ??= new ArithmeticOperationsFloatingPoint();
        $this->symbol = $symbol ?? static::$defaultSymbol;
    }

    public function getValue(): float
    {
        return $this->value;
    }

    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public static function getDefaultSymbol(): string
    {
        return static::$defaultSymbol;
    }

    public static function setDefaultSymbol(string $symbol): string
    {
        static::$defaultSymbol = $symbol;
        return static::$defaultSymbol;
    }

    public function setSymbol(string $symbol): string
    {
        $this->symbol = $symbol;
        return $this->symbol;
    }

    public function __toString(): string
    {
        return $this->value . " " . $this->getSymbol();
    }
}
