<?php
declare(strict_types=1);

namespace App\Warehousing\Domain\Entities;

final class Product
{
    /**
     * @var string
     */
    private $productName;

    public function __construct(string $productName)
    {
        $this->productName = $productName;
    }

    public function name() : string
    {
        return $this->productName;
    }
}
