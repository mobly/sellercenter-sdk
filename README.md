# SellerCenter SDK

[![Build Status](https://travis-ci.org/mobly/sellercenter-sdk.png?branch=master)](https://travis-ci.org/mobly/sellercenter-sdk)
[![Coverage Status](https://coveralls.io/repos/mobly/sellercenter-sdk/badge.png?branch=master)](https://coveralls.io/r/mobly/sellercenter-sdk?branch= master)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/545bfeef-8f19-41c7-b807-28dfd15c394b/mini.png)](https://insight.sensiolabs.com/projects/545bfeef-8f19-41c7-b807-28dfd15c394b)
[![Gitter](https://badges.gitter.im/Join%20Chat.svg)](https://gitter.im/mobly/sellercenter-sdk?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)

Welcome to the SellerCenter SDK repository.

## Installation

The recommended way to install this package is through composer.

	composer require mobly/sellercenter-sdk

## Quick examples

Here you can check sample usage of all SellerCenter API methods current available through this SDK.

### Product

* [GetProducts](https://github.com/mobly/sellercenter-sdk/wiki/Product-GetProducts) - Get all or a range of products
* [ProductCreate](https://github.com/mobly/sellercenter-sdk/wiki/Product-ProductCreate) - Create a new product
* [ProductUpdate](https://github.com/mobly/sellercenter-sdk/wiki/Product-ProductUpdate) - Update the attributes of one or more existing products
* [ProductRemove](https://github.com/mobly/sellercenter-sdk/wiki/Product-ProductRemove) - Removes one or more products
* [Image](https://github.com/mobly/sellercenter-sdk/wiki/Product-Image) - Set the Images for a Product, by associating one or more URLs with it
* [GetBrands](https://github.com/mobly/sellercenter-sdk/wiki/Product-GetBrands) - Get all or a range of product brands
* [GetCategoryTree](https://github.com/mobly/sellercenter-sdk/wiki/Product-GetCategoryTree) - Get the list of all product categories
* [GetCategoryAttributes](https://github.com/mobly/sellercenter-sdk/wiki/Product-GetCategoryAttributes) - Returns a list of attributes with options for a given category. It will also display attributes for TaxClass and ShipmentType, with their possible values listed as options
* [GetCategoriesByAttributeSet](https://github.com/mobly/sellercenter-sdk/wiki/Product-GetCategoriesByAttributeSet) - Returns a list of all attribute set categories

### Feed

* [FeedList](https://github.com/mobly/sellercenter-sdk/wiki/Feed-FeedList) - Returns all feeds created in the last 30 days
* [FeedOffsetList](https://github.com/mobly/sellercenter-sdk/wiki/Feed-FeedOffsetList) - Returns all or a subset of all feeds created in the last 30 days
* [FeedCount](https://github.com/mobly/sellercenter-sdk/wiki/Feed-FeedCount) - Feed Statistics
* [FeedCancel](https://github.com/mobly/sellercenter-sdk/wiki/Feed-FeedCancel) - Cancel all queued feeds
* [GetFeedRawInput](https://github.com/mobly/sellercenter-sdk/wiki/Feed-GetFeedRawInput) - For specified feeds, returns the XML requests originally passed in when the feed was created
* [FeedStatus](https://github.com/mobly/sellercenter-sdk/wiki/Feed-FeedStatus) - Returns detailed information about a specified feed

### Order

* [GetOrders](https://github.com/mobly/sellercenter-sdk/wiki/Order-GetOrders) - Get the customer details for a range of orders
* [GetOrder](https://github.com/mobly/sellercenter-sdk/wiki/Order-GetOrder) - Get the order items for a single order
* [GetMultipleOrderItems](https://github.com/mobly/sellercenter-sdk/wiki/Order-GetMultipleOrderItems) - Returns the items for one or more orders
* [SetStatusToCanceled](https://github.com/mobly/sellercenter-sdk/wiki/Order-SetStatusToCanceled) - Cancel a single item
* [SetStatusToReadyToShip](https://github.com/mobly/sellercenter-sdk/wiki/Order-SetStatusToReadyToShip) - Mark an order item as being ready to ship
* [SetStatusToShipped](https://github.com/mobly/sellercenter-sdk/wiki/Order-SetStatusToShipped) - Records that an order item has shipped
* [SetStatusToFailedDelivery](https://github.com/mobly/sellercenter-sdk/wiki/Order-SetStatusToFailedDelivery) - Records that an order item could not be delivered to the customer
* [SetStatusToDelivered](https://github.com/mobly/sellercenter-sdk/wiki/Order-SetStatusToDelivered) - Records that an order item was delivered
* [GetDocument](https://github.com/mobly/sellercenter-sdk/wiki/Order-GetDocument) - Retrieve order-related documents: Invoices, Shipping Labels and Shipping Parcels
* [GetFailureReasons](https://github.com/mobly/sellercenter-sdk/wiki/Order-GetFailureReasons) - Returns additional error context for SetToCancelled and SetToFailedDelivery

### Shipment Provider

* [GetShipmentProviders](https://github.com/mobly/sellercenter-sdk/wiki/ShipmentProvider-GetShipmentProviders) - Returns a list of all active shipping providers

### Seller Endpoints

* [GetMetrics](https://github.com/mobly/sellercenter-sdk/wiki/Seller-GetMetrics) - Returns sales and order metric for a specified period
* [GetPayoutStatus](https://github.com/mobly/sellercenter-sdk/wiki/Seller-GetPayoutStatus) - Returns sales and order metric for a specified period
* [GetStatistics](https://github.com/mobly/sellercenter-sdk/wiki/Seller-GetStatistics) - Returns sales and orders metrics for a specified period

## External reference

* [Oficial documentation of SellerCenter API](https://sellercenter.readme.io/)

## Contributing, support and issues

Please support this project send pull requests.

Follow [PSR-2](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md) rules, add the comments where needed, and provide sample explanation in the commit message.

Write unit tests for new features and grant that all existing tests passes before submiting a pull-request.

* To run unit tests just run `make test` or `[vendor/bin/]phpunit` from root directory
* To generate code coverage report run `make coverage` (and if you are using Mac OS run `make coverage-show` to open report in your browser)

Preferably before creating a pull request squash your commits into a single commit.

All contributors/authors are listed on [contributors page](https://github.com/mobly/sellercenter-sdk/graphs/contributors).

If you found any issue during use please report it on [issues page](https://github.com/mobly/sellercenter-sdk/issues).
