<?php
declare(strict_types=1);

namespace App\Warehousing\Infrastructure\Service;

use Doctrine\DBAL\Driver\Connection;
use Psr\Container\ContainerInterface;

final class DoctrineDbalInvoiceNumberRepositoryFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new DoctrineDbalInvoiceNumberRepository($container->get(Connection::class));
    }
}
