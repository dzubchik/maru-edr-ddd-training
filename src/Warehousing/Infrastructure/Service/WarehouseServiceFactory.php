<?php
declare(strict_types=1);

namespace App\Warehousing\Infrastructure\Service;

use App\Warehousing\Domain\Service\InvoiceNumberRepository;
use App\Warehousing\Domain\Service\WarehouseService;
use Psr\Container\ContainerInterface;

final class WarehouseServiceFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new WarehouseService($container->get(InvoiceNumberRepository::class));
    }
}
