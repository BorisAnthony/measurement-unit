<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Temperature;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\MeasurementUnit;

interface TemperatureInterface extends MeasurementUnit
{
    public static function getSymbol(): string;

    public static function toKelvinValue(float $value, ArithmeticOperations $arithmeticOperations): float;

    public static function fromKelvinValue(float $value, ArithmeticOperations $arithmeticOperations): float;
}
