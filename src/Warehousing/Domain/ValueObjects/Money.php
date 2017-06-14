<?php
declare(strict_types=1);

namespace App\Warehousing\Domain\ValueObjects;

final class Money
{
    /**
     * @var float
     */
    private $value;

    public function __construct(float $value)
    {
        // validation
        $this->value = $value;
    }

    public function __toString() : string
    {
        return (string)$this->value;
    }
}
