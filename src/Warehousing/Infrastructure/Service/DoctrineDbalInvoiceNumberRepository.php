<?php
declare(strict_types=1);

namespace App\Warehousing\Infrastructure\Service;

use App\Warehousing\Domain\Service\InvoiceNumberRepository;
use Doctrine\DBAL\Driver\Connection;

final class DoctrineDbalInvoiceNumberRepository implements InvoiceNumberRepository
{
    /**
     * @var Connection
     */
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function lastInvoiceNumber() : int
    {
        $stmt = $this->connection->prepare('SELECT MAX(invoiceNumber) FROM whateverTable');
        return (int)$stmt->execute();
    }
}
