<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit;

use Stringable;

interface MeasurementUnitInterface extends Stringable
{
    public function getValue(): float;

    public function getValueRounded(): float;

    public function getInstanceSymbol(): string;

    public function setInstanceSymbol(string $symbol): self;

    public static function getSymbol(): string;

    public static function setSymbol(string $symbol): string;

    public function toHtml(string $sprintf_Template): string;

    public function toFormat(string $sprintf_Template): string;

    public function __toString(): string;
}
