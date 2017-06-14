<?php
declare(strict_types=1);

namespace App\Warehousing\Domain\Entities;

use App\Warehousing\Domain\ValueObjects\LineItem;
use Assert\Assertion;

final class Invoice
{
    /**
     * @var LineItem[]
     */
    private $lineItems;

    /**
     * @var string
     */
    private $invoiceNumber;

    /**
     * @var \DateTimeImmutable
     */
    private $date;

    /**
     * @var bool
     */
    private $paidState;

    public function __construct(array $lineItems, string $invoiceNumber, \DateTimeImmutable $date)
    {
        Assertion::allIsInstanceOf($lineItems, LineItem::class);

        $this->lineItems = $lineItems;
        $this->invoiceNumber = $invoiceNumber;
        $this->date = $date;
        $this->paidState = false;
    }

    public function addLineItem(LineItem $lineItem) : void
    {
        //
    }

    public function increaseQuantityOfFirstLineItem() : void
    {
        $this->lineItems[0]->increaseQuantity()->increaseQuantity();
    }

    public function markAsPaid() : void
    {
        $this->paidState = true;
    }
}
