<?php
declare(strict_types=1);

namespace App\Warehousing\Domain\Service;

interface InvoiceNumberRepository
{
    public function lastInvoiceNumber() : int;
}
