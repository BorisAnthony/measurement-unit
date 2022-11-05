<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Temperature;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

class Fahrenheit extends Temperature
{
    public static function getSymbol(): string
    {
        return '°F';
    }

    public static function fromKelvinValue(float $value, ArithmeticOperations $arithmeticOperations): self
    {
        return new self(
            $arithmeticOperations->subtract(
                $arithmeticOperations->multiply(
                    $arithmeticOperations->divide($value, 5),
                    9
                ),
                459.67
            ),
            $arithmeticOperations
        );
    }

    public function toKelvinValue(): float
    {
        return $this->arithmeticOperations->divide(
            $this->arithmeticOperations->multiply(
                $this->arithmeticOperations->add($this->value, 459.67),
                5
            ),
            9
        );
    }
}
