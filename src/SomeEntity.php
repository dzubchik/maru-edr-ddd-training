<?php
declare(strict_types=1);

class InvoiceWasCreatedEvent {}
class LineItemWasAddedEvent {}
class InvoiceWasIssuedToSupplierEvent {}
class InvoiceWasPaidBySupplierEvent {}

class Invoice extends AbstractEventMessage
{
    private $invoiceDate;
    private $invoiceNumber;
    private $lineItems = [];
    private $paid = false;

    public function markAsPaid() : void
    {
        $this->applyEvent(new InvoiceWasPaidBySupplierEvent());
    }

    private function handleInvoiceWasCreated(InvoiceWasCreatedEvent $event) {
        $this->invoiceDate = $event->invoiceDate();
        $this->invoiceNumber = $event->invoiceNumber();
    }

    private function handleLineItemWasAdded(LineItemWasAddedEvent $event) {
        $this->lineItems[] = $event->lineItem();
    }

    private function handleInvoiceWasIssuedToSupplier(InvoiceWasIssuedToSupplierEvent $event) {
    }

    private function handleInvoiceWasPaidBySupplier(InvoiceWasPaidBySupplierEvent $event) {
        $this->paid = true;
    }
}
