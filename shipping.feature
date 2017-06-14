Feature: Ability to ship items to company

  Policies:
    - There should always be 10 MacBooks in stock

  @ui
  Scenario: When a product's stock level is running low, we should top up the stock
    Given stock levels of "MacBooks" have only <remainingstock> left
    When the stock keeper counts the number of "MacBooks"
    And notices there are only <remainingstock> left
    Then the stock keeper should notify the Incoming Shipping Manager to order <expectedordersize> new "MacBooks"
    Examples:
      | remainingstock | expectedordersize |
      | 7              | 3                 |
      | 2              | 8                 |
      | 0              | 10                |

  Scenario: When a product's stock level is full, nothing should happen
    Given we have 10 "MacBooks" in stock
    When the stock keeper counts the number of "MacBooks"
    And notices there are only 10 left
    Then the stock keeper will continue their stock checks elsewhere

#  Scenario: When a product is out of stock, it should be redelivered (automated)
#    When stock levels of "MacBooks" have run out
#    Then the Incoming Shipping Manager should order 10 new "MacBooks"
