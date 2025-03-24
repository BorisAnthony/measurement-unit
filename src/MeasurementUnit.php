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

    public function getInstanceSymbol(): string
    {
        return $this->symbol;
    }

    public function setInstanceSymbol(string $symbol): static
    {
        $this->symbol = $symbol;
        return $this;
    }

    public static function getSymbol(): string
    {
        return static::$defaultSymbol;
    }

    public static function setSymbol(string $symbol): string
    {
        static::$defaultSymbol = $symbol;
        return static::$defaultSymbol;
    }

    public function __toString(): string
    {
        return $this->getValue() . " " . $this->getInstanceSymbol();
    }
}
