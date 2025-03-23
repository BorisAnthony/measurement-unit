<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit;

use Stringable;

interface MeasurementUnitInterface extends Stringable
{
    public function getValue(): float; // Untested

    public function getInstanceSymbol(): string; // Untested

    public function setInstanceSymbol(string $symbol): string; // Untested

    public static function getSymbol(): string;

    public static function setSymbol(string $symbol): string; // Untested
}
