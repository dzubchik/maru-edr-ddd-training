<?php
declare(strict_types=1);

namespace App;

use App\Warehousing\Domain\Aggregate\Warehouse;
use App\Warehousing\Domain\Entities\Product;
use App\Warehousing\Domain\ValueObjects\Quantity;
use Behat\Behat\Context\Context;

class FeatureContext implements Context
{
    /**
     * @var Warehouse
     */
    private $warehouse;

    /**
     * @var Product
     */
    private $product;

    /**
     * @Given /^stock levels of "([^"]*)" have only (.*) left$/
     */
    public function stockLevelsOfHaveOnlyLeft(string $productName, int $remainingstock)
    {
        $this->product = new Product($productName);
        $this->warehouse = new Warehouse();
        $this->warehouse->reorder($this->product, new Quantity($remainingstock));
    }

    /**
     * @When /^the stock keeper counts the number of "([^"]*)"$/
     */
    public function theStockKeeperCountsTheNumberOf($productName)
    {
    }

    /**
     * @When /^notices there are only (.*) left$/
     */
    public function noticesThereAreOnlyLeft($remainingstock)
    {
        $this->warehouse->topUpStockAutomaticallyForProduct($this->product);
    }

    /**
     * @Then /^the stock keeper should notify the Incoming Shipping Manager to order (.*) new "([^"]*)"$/
     */
    public function theStockKeeperShouldNotifyTheIncomingShippingManagerToOrderNew(int $expectedordersize, string $productName)
    {
        $orders = $this->warehouse->getOpenOrdersForProduct($this->product);
        assertCount($orders, 1);
    }
}
