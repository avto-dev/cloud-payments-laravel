<p align="center">
  <img src="https://hsto.org/webt/q7/hk/ku/q7hkkufaehx9vc-st5qnsw7_i7o.png" alt="logo" width="128" />
</p>

# Cloud Payments PHP-client

[![Version][badge_packagist_version]][link_packagist]
[![Version][badge_php_version]][link_packagist]
[![Build Status][badge_build_status]][link_build_status]
[![Coverage][badge_coverage]][link_coverage]
[![Downloads count][badge_downloads_count]][link_packagist]
[![License][badge_license]][link_license] 
 
The package provides easy way to use [Cloud Payments API](https://developers.cloudpayments.ru/#api).

## Install

Require this package with composer using the following command:

```shell
$ composer require avto-dev/cloud-payments-laravel
```

> Installed `composer` is required ([how to install composer][getcomposer]).

## Frameworks integration

### Laravel 5

Laravel 5.5 and above uses Package Auto-Discovery, so doesn't require you to manually register the service-provider. Otherwise you must add the service provider to the `providers` array in `./config/app.php`:

```php
'providers' => [
    // ...
    AvtoDev\CloudPayments\Frameworks\Laravel\ServiceProvider::class,
]
```


## Usage

### How to get a client instance

If using Laravel framework, then you can get an instance of `ClientInterface` using `make` method to resolve.

```php
$client = $this->app->make(AvtoDev\CloudPayments\Client\ClientInterface::class);
```

You can send a request using the `send` method:

```php
$client->send($request);
```

Where `$request` is an instance of `RequestInterface`.

You can also call the `send` method on the `RequestInterface` instance.
Before that, you must call the `setClient` method on the `RequestInterface` with `ClientInterface`

```php
$request->setClient($client)->send();
```

You can choose the way you like.

### How to create a request

List of available requests: 

#### Cryptogram payment

[Cryptogram payment docs here](https://developers.cloudpayments.ru/#oplata-po-kriptogramme).

`CryptogramPaymentOneStepRequest` - for one-step payment;

`CryptogramPaymentTwoStepRequest` - for two-step payment.

Creating and sending a request:

```php
<?php

use AvtoDev\CloudPayments\Client\ClientInterface;
use AvtoDev\CloudPayments\Message\Request\CryptogramPaymentOneStepRequest;
use AvtoDev\CloudPayments\Message\Request\CryptogramPaymentTwoStepRequest;
use AvtoDev\CloudPayments\Message\Response\Cryptogram3dSecureAuthRequiredResponse;
use AvtoDev\CloudPayments\Message\Response\CryptogramTransactionAcceptedResponse;
use AvtoDev\CloudPayments\Message\Response\CryptogramTransactionRejectedResponse;
use AvtoDev\CloudPayments\Message\Response\InvalidRequestResponse;

/** @var ClientInterface $client */
$client = $this->app->make(ClientInterface::class);

$request = CryptogramPaymentOneStepRequest::create();
/*
or we can also use:

$request = new CryptogramPaymentTwoStepRequest;
*/

$request
    ->getModel()
    ->setAmount(100.0)
    ->setCurrency('RUB')
    ->setIpAddress('127.0.0.1')
    ->setName('CARDHOLDER NAME')
    ->setCardCryptogramPacket('CARD_CRYPTOGRAM_PACKET');

/** @var InvalidRequestResponse|Cryptogram3dSecureAuthRequiredResponse|CryptogramTransactionRejectedResponse|CryptogramTransactionAcceptedResponse $response */
$response = $request->setClient($client)->send();
```
Before calling the `send` method to send a request, we must fill out the request data model. To do that, call the `getModel` method on `RequestInterface` and use setters to set values. Use autocomplete of your IDE for to access setters.

The `$response` must be an instance of one of the classes: `InvalidRequestResponse`, `Cryptogram3dSecureAuthRequiredResponse`, `CryptogramTransactionRejectedResponse`, `CryptogramTransactionAcceptedResponse`

The `$response` (an instance of `ResponseInterface`) also has its own data model. Use the `getModel` method and getters to access the data.


Checking the type of response and accessing the response data model fields:
```php
<?php

use AvtoDev\CloudPayments\Message\Response\CryptogramTransactionAcceptedResponse;

if ($response instanceof CryptogramTransactionAcceptedResponse) {
    $transaction_id = $response->getModel()->getTransactionId();
    $status_code = $response->getModel()->getStatusCode();
    $token = $response->getModel()->getToken();
}
```

#### 3-D Secure Processing

[3-D Secure Processing docs here](https://developers.cloudpayments.ru/#obrabotka-3-d-secure).

`CompletionOf3dSecureRequest` - for to complete the 3-D Secure payment.

Possible answers: `InvalidRequestResponse`, `Cryptogram3dSecureAuthRequiredResponse`, `CryptogramTransactionRejectedResponse`, `CryptogramTransactionAcceptedResponse`

#### Token Payment

[Token Payment docs here](https://developers.cloudpayments.ru/#oplata-po-tokenu-rekarring).


`TokenPaymentOneStepRequest` - for one-step payment;
`TokenPaymentTwoStepRequest` - for two-step payment.

Possible answers: `InvalidRequestResponse`, `CryptogramTransactionRejectedResponse`, `CryptogramTransactionAcceptedResponse`

#### Cancel payment

[Cancel payment docs here](https://developers.cloudpayments.ru/#otmena-oplaty).

`CancelPaymentRequest` - сancel payment for two-step payment request

Possible answers: `InvalidRequestResponse`, `SuccessResponse`

#### Refund payment

[Refund payment docs here](https://developers.cloudpayments.ru/#vozvrat-deneg).

`RefundPaymentRequest` - refund for payment made

Possible answers: `InvalidRequestResponse`, `RefundPaymentResponse`

#### Create a recurring payment subscription

[Create a recurring payment subscription docs here](https://developers.cloudpayments.ru/#sozdanie-podpiski-na-rekurrentnye-platezhi).

`CreateSubscriptionRequest` - creating a subscription for payments that will be made in the future

Possible answers: `InvalidRequestResponse`, `SubscriptionResponse`

#### Request Subscription Information

[Request Subscription Information docs here](https://developers.cloudpayments.ru/#zapros-informatsii-o-podpiske).

`GetSubscriptionRequest`

Possible answers: `InvalidRequestResponse`, `SubscriptionResponse`

#### Search Subscriptions

[Search Subscriptions docs here](https://developers.cloudpayments.ru/#poisk-podpisok).

`FindSubscriptionRequest`

Possible answers: `InvalidRequestResponse`, `SubscriptionsResponse`

#### Change subscription

[Change subscription docs here](https://developers.cloudpayments.ru/#izmenenie-podpiski-na-rekurrentnye-platezhi).

`UpdateSubscriptionRequest`

Possible answers: `InvalidRequestResponse`, `SubscriptionResponse`

#### Cancel subscription

[Cancel subscription docs here](https://developers.cloudpayments.ru/#otmena-podpiski-na-rekurrentnye-platezhi).

`CancelSubscriptionRequest`


Possible answers: `InvalidRequestResponse`, `SuccessResponse`

#### Usage example without Laravel framework:

```php
<?php

use GuzzleHttp\Client as GuzzleHttpClient;
use AvtoDev\CloudPayments\Client\Client;
use AvtoDev\CloudPayments\Message\Request\CryptogramPaymentOneStepRequest;
use AvtoDev\CloudPayments\Message\Response\CryptogramTransactionAcceptedResponse;
use AvtoDev\CloudPayments\Message\Response\InvalidRequestResponse;

$public_key  = '';
$private_key = '';

$client = new Client(
    new GuzzleHttpClient(),
    $public_key,
    $private_key
);

$request = CryptogramPaymentOneStepRequest::create();
$request
    ->getModel()
    ->setAmount(100.0)
    ->setCurrency('RUB')
    ->setIpAddress('127.0.0.1')
    ->setName('CARDHOLDER NAME')
    ->setCardCryptogramPacket('CARD_CRYPTOGRAM_PACKET');

$response = $request->setClient($client)->send();

if ($response instanceof CryptogramTransactionAcceptedResponse) {
    $transaction_id = $response->getModel()->getTransactionId();
} elseif ($response instanceof InvalidRequestResponse) {
    $error_message = $response->getMessage();
}
```

How to get [CARD_CRYPTOGRAM_PACKET](https://developers.cloudpayments.ru/#skript-checkout)?

### Testing

For package testing we use `phpunit` framework. Just write into your terminal:

```shell
$ git clone ... && cd $_
$ make build
$ make composer-install
$ make unit-tests
```

## Changes log

[![Release date][badge_release_date]][link_releases]
[![Commits since latest release][badge_commits_since_release]][link_commits]

Changes log can be [found here][link_changeslog].

## Support

[![Issues][badge_issues]][link_issues]
[![Issues][badge_pulls]][link_pulls]

If you will find any package errors, please, [make an issue][link_create_issue] in current repository.

## License

This is open-sourced software licensed under the [MIT License][link_license].

[badge_packagist_version]:https://img.shields.io/packagist/v/avto-dev/cloud-payments-laravel.svg?maxAge=180
[badge_php_version]:https://img.shields.io/packagist/php-v/avto-dev/cloud-payments-laravel.svg?longCache=true
[badge_build_status]:https://travis-ci.org/avto-dev/cloud-payments-laravel.svg?branch=master
[badge_coverage]:https://img.shields.io/codecov/c/github/avto-dev/cloud-payments-laravel/master.svg?maxAge=60
[badge_downloads_count]:https://img.shields.io/packagist/dt/avto-dev/cloud-payments-laravel.svg?maxAge=180
[badge_license]:https://img.shields.io/packagist/l/avto-dev/cloud-payments-laravel.svg?longCache=true
[badge_release_date]:https://img.shields.io/github/release-date/avto-dev/cloud-payments-laravel.svg?style=flat-square&maxAge=180
[badge_commits_since_release]:https://img.shields.io/github/commits-since/avto-dev/cloud-payments-laravel/latest.svg?style=flat-square&maxAge=180
[badge_issues]:https://img.shields.io/github/issues/avto-dev/cloud-payments-laravel.svg?style=flat-square&maxAge=180
[badge_pulls]:https://img.shields.io/github/issues-pr/avto-dev/cloud-payments-laravel.svg?style=flat-square&maxAge=180
[link_releases]:https://github.com/avto-dev/cloud-payments-laravel/releases
[link_packagist]:https://packagist.org/packages/avto-dev/cloud-payments-laravel
[link_build_status]:https://travis-ci.org/avto-dev/cloud-payments-laravel
[link_coverage]:https://codecov.io/gh/avto-dev/cloud-payments-laravel/
[link_changeslog]:https://github.com/avto-dev/cloud-payments-laravel/blob/master/CHANGELOG.md
[link_issues]:https://github.com/avto-dev/cloud-payments-laravel/issues
[link_create_issue]:https://github.com/avto-dev/cloud-payments-laravel/issues/new
[link_commits]:https://github.com/avto-dev/cloud-payments-laravel/commits
[link_pulls]:https://github.com/avto-dev/cloud-payments-laravel/pulls
[link_license]:https://github.com/avto-dev/cloud-payments-laravel/blob/master/LICENSE
[getcomposer]:https://getcomposer.org/download/
