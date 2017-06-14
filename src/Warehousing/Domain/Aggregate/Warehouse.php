<?php
declare(strict_types=1);

namespace App\Warehousing\Domain\Aggregate;

use App\Warehousing\Domain\Entities\Invoice;
use App\Warehousing\Domain\Entities\Product;
use App\Warehousing\Domain\Service\InvoiceNumberRepository;
use App\Warehousing\Domain\ValueObjects\LineItem;
use App\Warehousing\Domain\ValueObjects\Money;
use App\Warehousing\Domain\ValueObjects\ProductCode;
use App\Warehousing\Domain\ValueObjects\Quantity;

final class Warehouse
{
    private const MINIMUM_PRODUCT_STOCK = [
        'MACBOOK' => 10,
    ];

    /**
     * @var Product[]
     */
    private $products;

    public function checkStockFor(Product $product) : Quantity
    {
    }

    public function reorder(Product $product, Quantity $quantity) : void
    {
    }

    public function topUpStockAutomaticallyForProduct(Product $product)
    {
        $quantityNeeded = new Quantity(
            self::MINIMUM_PRODUCT_STOCK[$product->name()] - $this->checkStockFor($product)
        );

        if ($quantityNeeded->isZero()) {
            return;
        }
        $this->reorder($product, $quantityNeeded);
    }

    public function createInvoiceForMacbooks(Quantity $quantity, InvoiceNumberRepository $invoiceNumberRepository)
    {
        $newInvoiceNumber = 'INV' . ($invoiceNumberRepository->lastInvoiceNumber() + 1);
        return new Invoice(
            [
                new LineItem(new ProductCode('MACBOOK'), $quantity, new Money(12.34))
            ],
            $newInvoiceNumber,
            new \DateTimeImmutable()
        );
    }
}
