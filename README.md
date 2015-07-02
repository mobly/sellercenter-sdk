# SellerCenter PHP-SDK

[![Build Status](https://travis-ci.org/mobly/sellercenter-sdk.png?branch=master)](https://travis-ci.org/mobly/sellercenter-sdk)
[![Coverage Status](https://coveralls.io/repos/mobly/sellercenter-sdk/badge.png?branch=master)](https://coveralls.io/r/mobly/sellercenter-sdk?branch= master)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/545bfeef-8f19-41c7-b807-28dfd15c394b/mini.png)](https://insight.sensiolabs.com/projects/545bfeef-8f19-41c7-b807-28dfd15c394b)
[![Gitter](https://badges.gitter.im/Join%20Chat.svg)](https://gitter.im/mobly/sellercenter-sdk?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)

Welcome to the SellerCenter SDK repository.

## Sample Requests

Here you can check sample requests for the different API scopes.

### Product

* [Search](https://github.com/mobly/sellercenter-sdk/wiki/Product-GetProducts) - Returns a list of all products
* [Image](https://github.com/mobly/sellercenter-sdk/wiki/Product-Image) - Performs upload of product images
* [ProductCreate](https://github.com/mobly/sellercenter-sdk/wiki/Product-ProductCreate) - Performs product insertions
* [ProductRemove](https://github.com/mobly/sellercenter-sdk/wiki/Product-ProductRemove) - Performs product removals
* [ProductUpdate](https://github.com/mobly/sellercenter-sdk/wiki/Product-ProductUpdate) - Performs product updates
* [GetBrands (currently not available on SDK)](https://github.com/mobly/sellercenter-sdk/wiki/Product-GetBrands) - Returns a list of all product brands
* [GetCategoryTree (currently not available on SDK)](https://github.com/mobly/sellercenter-sdk/wiki/Product-GetCategoryTree) - Returns a list of all product categories

### Feed

* [FeedList](https://github.com/mobly/sellercenter-sdk/wiki/Feed-FeedList) - Performs listing of all feeds
* [FeedOffsetList](https://github.com/mobly/sellercenter-sdk/wiki/Feed-FeedOffsetList) - Performs paged listing of feeds
* [FeedCount](https://github.com/mobly/sellercenter-sdk/wiki/Feed-FeedCount) - Retrieves counters for the existing feeds
* [FeedStatus](https://github.com/mobly/sellercenter-sdk/wiki/Feed-FeedStatus) - Retrieves detailed information about a given feed
* [FeedCancel](https://github.com/mobly/sellercenter-sdk/wiki/Feed-FeedCancel) - Cancels a queued feed

### Order

* [GetOrders](https://github.com/mobly/sellercenter-sdk/wiki/Order-GetOrders) - Returns a list of orders created or updated during a time period
* [GetOrder](https://github.com/mobly/sellercenter-sdk/wiki/Order-GetOrder) - Returns an order using SellerCenter's field **OrderId**
* [GetOrderItems](https://github.com/mobly/sellercenter-sdk/wiki/Order-GetOrderItems) - Returns order items based on the OrderId
* [GetOrderItems](https://github.com/mobly/sellercenter-sdk/wiki/Order-GetMultipleOrderItems) - Returns multiple order items based on the OrderId
* [SetStatusToCanceled](https://github.com/mobly/sellercenter-sdk/wiki/Order-SetStatusToCanceled) - Informs SellerCenter that an item with id **OrderItemId** has been canceled
* [SetStatusToReadyToShip](https://github.com/mobly/sellercenter-sdk/wiki/Order-SetStatusToReadyToShip) - Informs SellerCenter that the item is ready to ship
* [SetStatusToShipped](https://github.com/mobly/sellercenter-sdk/wiki/Order-SetStatusToShipped) - Informs SellerCenter that an item with id **OrderItemId** has been shipped
* [SetStatusToFailedDelivery](https://github.com/mobly/sellercenter-sdk/wiki/Order-SetStatusToFailedDelivery) - informs SellerCenter that an item with identification **OrderItemId** has failed
* [SetStatusToDelivered](https://github.com/mobly/sellercenter-sdk/wiki/Order-SetStatusToDelivered) - Informs SellerCenter that an item with identification **OrderItemId** has been delivered
* [GetFailureReasons](https://github.com/mobly/sellercenter-sdk/wiki/Order-GetFailureReasons) - Returns reasons for *SetToCanceled* and *SetToFailedDelivery* calls
* [GetShipmentProviders](https://github.com/mobly/sellercenter-sdk/wiki/Order-GetShipmentProviders) - Returns all active shipping providers

## Contributing

Follow [PSR-2](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md) rules, add the comments where needed, and provide sample explanation in the commit message.

Write unit tests for new features and grant that all tests passes before submiting a pull-request.

* To run unit tests just run `make test` or `vendor/bin/phpunit` from root directory
* To generate code coverage report run `make coverage` (and if you are using Mac OS run `make coverage-show` to open report in your browser)

Preferably before creating a pull request squash your commits into a single commit.
