<?php
declare(strict_types=1);

namespace App\Warehousing\Domain\Service;

use App\Warehousing\Domain\ValueObjects\Quantity;

interface WarehouseServiceInterface
{
    public function createInvoiceForMacbooks(Quantity $quantity);
}
