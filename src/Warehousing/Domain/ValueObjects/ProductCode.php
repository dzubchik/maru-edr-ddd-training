<?php
declare(strict_types=1);

namespace App\Warehousing\Domain\ValueObjects;

use Assert\Assertion;

final class ProductCode
{
    /**
     * @var string
     */
    private $value;

    public function __construct(string $value)
    {
        Assertion::regex('/[A-Z]/', $value, 'Product code can only be capital letters A-Z');
        $this->value = $value;
    }

    public function __toString() : string
    {
        return $this->value;
    }
}
