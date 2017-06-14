<?php
declare(strict_types=1);

namespace App\Warehousing\Domain\ValueObjects;

use Assert\Assertion;

final class Quantity
{
    /**
     * @var int
     */
    private $value;

    public function __construct(int $value)
    {
        Assertion::greaterOrEqualThan(0, $value, 'Quantity cannot be less than zero');
        $this->value = $value;
    }

    public function __toString() : string
    {
        return (string)$this->value;
    }

    public function increment() : self
    {
        $new = clone $this;
        $new->value++;
        return $new;
    }

    public function isZero() : bool
    {
        return $this->value === 0;
    }
}
