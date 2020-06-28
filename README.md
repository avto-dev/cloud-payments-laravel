<p align="center">
  <img src="https://hsto.org/webt/q7/hk/ku/q7hkkufaehx9vc-st5qnsw7_i7o.png" alt="logo" width="128" />
</p>

# Cloud Payments PHP-client

[![Version][badge_packagist_version]][link_packagist]
[![PHP Version][badge_php_version]][link_packagist]
[![Build Status][badge_build_status]][link_build_status]
[![Coverage][badge_coverage]][link_coverage]
[![Downloads count][badge_downloads_count]][link_packagist]
[![License][badge_license]][link_license]

The package provides easy way to use [Cloud Payments API](https://developers.cloudpayments.ru/#api).

## Install

Require this package with composer using the following command:

```shell
$ composer require avto-dev/cloud-payments-laravel "^1.0"
```

> Installed `composer` is required ([how to install composer][getcomposer]).

## Configuration

> You can find laravel framework integration [here](#frameworks-integration)

For client configuration use `Config` instance. It constructor require **Public ID** and **API Secret**
that you can find in ClodPayments personal area.

```php
use AvtoDev\CloudPayments\Config;

$config = new Config('pk_some_key', 'some_api_key');
```

## Usage

Select one of [requset builders](#request-builders):

```php
$request_builder = new \AvtoDev\CloudPayments\Requests\Payments\Cards\CardsAuthRequestBuilder;
```

Set all necessary parameters through the setters:

```php
/** @var $request_builder \AvtoDev\CloudPayments\Requests\AbstractRequestBuilder */

$request_builder->setAccountId('some_id');
$request_builder->setName('name');
```

Get PSR7 request:

```php
/** @var \AvtoDev\CloudPayments\Requests\AbstractRequestBuilder $request_builder */
/** @var \Psr\Http\Message\RequestInterface $request */

$request = $request_builder->buildRequest();
```

Set up client, and send the request:

```php
$client = new \AvtoDev\CloudPayments\Client(
    new \GuzzleHttp\Client,
    new \AvtoDev\CloudPayments\Config('public_id', 'api_key')
);

/** @var \Psr\Http\Message\RequestInterface $request */
$response = $client->send($request);
```

## Api client

### Constructing

Constructor requires any `GuzzleHttp\ClientInterface` instance and `Config` instance

```php
/** @var \AvtoDev\CloudPayments\Config $config */

use AvtoDev\CloudPayments\Client;
use GuzzleHttp\Client as GuzzleClient;

$client = new Client(new GuzzleClient, $config);
```

### Sending

This method allows to send any `Psr\Http\Message\RequestInterface` and returns only `Psr\Http\Message\ResponseInterface`,
that allow you to build own requests as you want or use one of provided requests builders.

This client does only one thing: authorizes requests for CloudPayments and sends them.

```php
$request = new \GuzzleHttp\Psr7\Request('POST','https://api',[],'{"foo":"bar"}');

/** @var \AvtoDev\CloudPayments\Client $client */
$response = $client->send($request);
```

## Request builders

Supported builders:

Builder                             | Description                                          | Documentation link
:---------------------------------- | :--------------------------------------------------- | :-------------------------:
`TestRequestBuilder`                | The method to test the interaction with the API      | [Link][method_test_doc]
`CardsAuthRequestBuilder`           | The method to make a payment by a cryptogram         | [Link][method_payment_by_cryptogram]
`CardsChargeRequestBuilder`         | The method to make a payment by a cryptogram. Charge only | [Link][method_payment_by_cryptogram]
`CardsPost3DsRequestBuilder`        | 3-D Secure Processing                                | [Link][method_payment_3ds]
`TokensAuthRequestBuilder`          | The method to make a payment by a token              | [Link][method_payment_token]
`TokensChargeRequestBuilder`        | The method to make a payment by a token. Charge only | [Link][method_payment_token]
`PaymentsConfirmRequestBuilder`     | Payment Confirmation                                 | [Link][method_payment_confirm]
`PaymentsVoidRequestBuilder`        | Payment Cancellation                                 | [Link][method_payment_cancel]
`SubscriptionsCreateRequestBuilder` | Creation of Subscriptions on Recurrent Payments      | [Link][method_subscription_create]
`SubscriptionsGetRequestBuilder`    | Subscription Details                                 | [Link][method_subscription_get]
`SubscriptionsFindRequestBuilder`   | Subscriptions Search                                 | [Link][method_subscription_find]
`SubscriptionsUpdateRequestBuilder` | Recurrent Payments Subscription Change               | [Link][method_subscription_update]
`SubscriptionsCancelRequestBuilder` | Subscription on Recurrent Payments Cancellation      | [Link][method_subscription_cancel]

> How to get [card cryptogram packet](https://developers.cloudpayments.ru/#skript-checkout)?

### Idempotency

**Idempotency** is an ability of API to produce the same result as the first one without re-processing in case of repeated requests. That means you can send several requests to the system with the same identifier, and only one request will be processed. All the responses will be identical. Thus the protection against network errors is implemented which can lead to creation of duplicate records and actions.

To enable idempotency, it is necessary to call `setRequestId('request_id')` method with a unique identifier in API request. Generation of request identifier remains on your side - it can be a guid, a combination of an order number, date and amount, or other values of your choice. Each new request that needs to be processed must include new `request_id` value. The processed result is stored in the system for 1 hour.

[method_test_doc]:https://developers.cloudpayments.ru/en/#test-method
[method_payment_by_cryptogram]:https://developers.cloudpayments.ru/en/#payment-by-a-cryptogram
[method_payment_3ds]:https://developers.cloudpayments.ru/en/#3-d-secure-processing
[method_payment_token]:https://developers.cloudpayments.ru/en/#payment-by-a-token-recurring
[method_payment_confirm]:https://developers.cloudpayments.ru/en/#payment-confirmation
[method_payment_cancel]:https://developers.cloudpayments.ru/en/#payment-cancellation
[method_subscription_create]:https://developers.cloudpayments.ru/en/#creation-of-subscriptions-on-recurrent-payments
[method_subscription_get]:https://developers.cloudpayments.ru/en/#subscription-details
[method_subscription_find]:https://developers.cloudpayments.ru/en/#subscriptions-search
[method_subscription_update]:https://developers.cloudpayments.ru/en/#recurrent-payments-subscription-change
[method_subscription_cancel]:https://developers.cloudpayments.ru/en/#subscription-on-recurrent-payments-cancellation

## Frameworks integration

### Laravel

Laravel 5.5 and above uses Package Auto-Discovery, so doesn't require you to manually register the service-provider. Otherwise you must add the service provider to the `providers` array in `./config/app.php`:

```php
'providers' => [
    // ...
    AvtoDev\CloudPayments\Frameworks\Laravel\ServiceProvider::class,
]
```

#### Laravel configuration

Service provider pick configuration from `services.cloud_payments` config. So you need to put it into `config/services.php` file. For example:

```php
return [
    // ...
    /*
    |--------------------------------------------------------------------------
    | CloudPayments Settings
    |--------------------------------------------------------------------------
    | - `public_id` (string) - Public ID  (You can find it in personal area)
    | - `api_key`   (string) - API Secret (You can find it in personal area)
    |
    */
    'cloud_payments' => [
        'public_id' => env('CLOUD_PAYMENTS_PUBLIC_ID', 'some id'),
        'api_key'   => env('CLOUD_PAYMENTS_API_KEY', 'some api key'),
    ],
];
```

## Testing

For package testing we use `phpunit` framework. Just write into your terminal:

```shell
$ make build
$ make install
$ make test
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
[badge_build_status]:https://img.shields.io/github/workflow/status/avto-dev/cloud-payments-laravel/tests/master
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
