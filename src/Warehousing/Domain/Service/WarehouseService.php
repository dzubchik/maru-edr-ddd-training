<?php
declare(strict_types=1);

namespace App\Warehousing\Domain\Service;

use App\Warehousing\Domain\Aggregate\Warehouse;
use App\Warehousing\Domain\ValueObjects\Quantity;

final class WarehouseService implements WarehouseServiceInterface
{
    /**
     * @var InvoiceNumberRepository
     */
    private $invoiceNumberRepository;

    public function __construct(InvoiceNumberRepository $invoiceNumberRepository)
    {
        $this->invoiceNumberRepository = $invoiceNumberRepository;
    }

    public function createInvoiceForMacbooks(Quantity $quantity)
    {
        $warehouse = new Warehouse();
        $warehouse->createInvoiceForMacbooks($quantity, $this->invoiceNumberRepository);
    }
}
