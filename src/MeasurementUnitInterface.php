<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit;

use Stringable;

interface MeasurementUnitInterface extends Stringable
{
    public function getValue(): float;

    public function getSymbol(): string;

    public function setSymbol(string $symbol): string;

    public static function getDefaultSymbol(): string;

    public static function setDefaultSymbol(string $symbol): string;
}
