<?php
declare(strict_types=1);

namespace App\Warehousing\Domain\ValueObjects;

final class LineItem
{
    /**
     * @var ProductCode
     */
    private $productCode;

    /**
     * @var Quantity
     */
    private $quantity;

    /**
     * @var Money
     */
    private $unitPrice;

    public function __construct(ProductCode $productCode, Quantity $quantity, Money $unitPrice)
    {
        $this->productCode = $productCode;
        $this->quantity = $quantity;
        $this->unitPrice = $unitPrice;
    }

    public function increaseQuantity() : self
    {
        $new = clone $this;
        $new->quantity = $this->quantity->increment();
        return $new;
    }

    public function toProductCode() : ProductCode
    {
        return $this->productCode;
    }

    public function toUnitPrice() : Money
    {
        return $this->unitPrice;
    }

    public function toQuantity() : Quantity
    {
        return $this->quantity;
    }
}
