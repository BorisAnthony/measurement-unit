<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Length;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\ArithmeticOperationsFloatingPoint\ArithmeticOperationsFloatingPoint;

abstract class Length implements LengthInterface
{
    protected ArithmeticOperations $arithmeticOperations;

    public function __construct(protected float $value, ?ArithmeticOperations $arithmeticOperations = null)
    {
        $this->arithmeticOperations = $arithmeticOperations ?? new ArithmeticOperationsFloatingPoint();
    }

    public function getArithmeticOperations(): ArithmeticOperations
    {
        return $this->arithmeticOperations;
    }

    public function toFathom(): Fathom
    {
        return $this->toUnit(Fathom::class);
    }

    public function toFoot(): Foot
    {
        return $this->toUnit(Foot::class);
    }

    public function toFurlong(): Furlong
    {
        return $this->toUnit(Furlong::class);
    }

    public function toHorseLength(): HorseLength
    {
        return $this->toUnit(HorseLength::class);
    }

    public function toInch(): Inch
    {
        return $this->toUnit(Inch::class);
    }

    public function toMeter(): Meter
    {
        return $this->toUnit(Meter::class);
    }

    public function toMile(): Mile
    {
        return $this->toUnit(Mile::class);
    }

    public function toNauticalMile(): NauticalMile
    {
        return $this->toUnit(NauticalMile::class);
    }

    public function toStatuteMile(): StatuteMile
    {
        return $this->toUnit(StatuteMile::class);
    }

    public function toThou(): Thou
    {
        return $this->toUnit(Thou::class);
    }

    public function toYard(): Yard
    {
        return $this->toUnit(Yard::class);
    }

    /**
     * @template T of LengthInterface
     * @param class-string<T> $fqn
     * @return T
     */
    protected function toUnit(string $fqn): Length
    {
        return $fqn::fromMeterValue($this->toMeterValue(), $this->arithmeticOperations);
    }

    public function __toString(): string
    {
        return $this->value . static::getSymbol();
    }
}
