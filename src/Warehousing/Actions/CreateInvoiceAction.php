<?php
declare(strict_types=1);

namespace App\Warehousing\Actions;

use App\Warehousing\Domain\Service\WarehouseServiceInterface;
use App\Warehousing\Domain\ValueObjects\Quantity;

final class CreateInvoiceAction
{
    /**
     * @var WarehouseServiceInterface
     */
    private $warehouseService;

    public function __construct(WarehouseServiceInterface $warehouseService)
    {
        $this->warehouseService = $warehouseService;
    }

    public function process(RequestInterface $request, DelegateInterface $delegate) : ResponseInterface
    {
        $this->warehouseService->createInvoiceForMacbooks(new Quantity(5));
        return new RedirectResponse('..');
    }
}
