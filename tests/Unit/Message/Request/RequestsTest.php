<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Message\Request;

use AvtoDev\CloudPayments\Message\Request\ApplePayStartSessionRequest;
use AvtoDev\CloudPayments\Message\Request\CancelPaymentRequest;
use AvtoDev\CloudPayments\Message\Request\CancelSubscriptionRequest;
use AvtoDev\CloudPayments\Message\Request\CompletionOf3dSecureRequest;
use AvtoDev\CloudPayments\Message\Request\CreateSubscriptionRequest;
use AvtoDev\CloudPayments\Message\Request\CryptogramPaymentOneStepRequest;
use AvtoDev\CloudPayments\Message\Request\CryptogramPaymentTwoStepRequest;
use AvtoDev\CloudPayments\Message\Request\FindSubscriptionRequest;
use AvtoDev\CloudPayments\Message\Request\GetSubscriptionRequest;
use AvtoDev\CloudPayments\Message\Request\Model\ApplePayStartSessionModel;
use AvtoDev\CloudPayments\Message\Request\Model\CancelPaymentModel;
use AvtoDev\CloudPayments\Message\Request\Model\CancelSubscriptionModel;
use AvtoDev\CloudPayments\Message\Request\Model\CompletionOf3dSecureModel;
use AvtoDev\CloudPayments\Message\Request\Model\CreateSubscriptionModel;
use AvtoDev\CloudPayments\Message\Request\Model\CryptogramPaymentModel;
use AvtoDev\CloudPayments\Message\Request\Model\FindSubscriptionModel;
use AvtoDev\CloudPayments\Message\Request\Model\GetSubscriptionModel;
use AvtoDev\CloudPayments\Message\Request\Model\NullModel;
use AvtoDev\CloudPayments\Message\Request\Model\RefundPaymentModel;
use AvtoDev\CloudPayments\Message\Request\Model\TokenPaymentModel;
use AvtoDev\CloudPayments\Message\Request\Model\UpdateSubscriptionModel;
use AvtoDev\CloudPayments\Message\Request\RefundPaymentRequest;
use AvtoDev\CloudPayments\Message\Request\RequestInterface;
use AvtoDev\CloudPayments\Message\Request\TestRequest;
use AvtoDev\CloudPayments\Message\Request\TokenPaymentOneStepRequest;
use AvtoDev\CloudPayments\Message\Request\TokenPaymentTwoStepRequest;
use AvtoDev\CloudPayments\Message\Request\UpdateSubscriptionRequest;
use PHPUnit\Framework\TestCase;

/**
 * @group  unit
 * @group  requests
 * @covers \AvtoDev\CloudPayments\Message\Request\ApplePayStartSessionRequest
 * @covers \AvtoDev\CloudPayments\Message\Request\CancelSubscriptionRequest
 * @covers \AvtoDev\CloudPayments\Message\Request\CompletionOf3dSecureRequest
 * @covers \AvtoDev\CloudPayments\Message\Request\CreateSubscriptionRequest
 * @covers \AvtoDev\CloudPayments\Message\Request\CryptogramPaymentOneStepRequest
 * @covers \AvtoDev\CloudPayments\Message\Request\CryptogramPaymentTwoStepRequest
 * @covers \AvtoDev\CloudPayments\Message\Request\FindSubscriptionRequest
 * @covers \AvtoDev\CloudPayments\Message\Request\GetSubscriptionRequest
 * @covers \AvtoDev\CloudPayments\Message\Request\TestRequest
 * @covers \AvtoDev\CloudPayments\Message\Request\TokenPaymentOneStepRequest
 * @covers \AvtoDev\CloudPayments\Message\Request\TokenPaymentTwoStepRequest
 * @covers \AvtoDev\CloudPayments\Message\Request\UpdateSubscriptionRequest
 * @covers \AvtoDev\CloudPayments\Message\Request\CancelPaymentRequest
 * @covers \AvtoDev\CloudPayments\Message\Request\RefundPaymentRequest
 *
 **/
class RequestsTest extends TestCase
{
    public function dataProvider()
    {
        return [
            ApplePayStartSessionRequest::class => [
                    ApplePayStartSessionRequest::class,
                    ApplePayStartSessionModel::class,
                    'https://api.cloudpayments.ru/applepay/startsession',
                ],

            CancelSubscriptionRequest::class => [
                    CancelSubscriptionRequest::class,
                    CancelSubscriptionModel::class,
                    'https://api.cloudpayments.ru/subscriptions/cancel',
                ],

            CompletionOf3dSecureRequest::class => [
                    CompletionOf3dSecureRequest::class,
                    CompletionOf3dSecureModel::class,
                    'https://api.cloudpayments.ru/payments/cards/post3ds',
                ],

            CreateSubscriptionRequest::class => [
                    CreateSubscriptionRequest::class,
                    CreateSubscriptionModel::class,
                    'https://api.cloudpayments.ru/subscriptions/create',
                ],

            CryptogramPaymentOneStepRequest::class => [
                    CryptogramPaymentOneStepRequest::class,
                    CryptogramPaymentModel::class,
                    'https://api.cloudpayments.ru/payments/cards/charge',
                ],

            CryptogramPaymentTwoStepRequest::class => [
                    CryptogramPaymentTwoStepRequest::class,
                    CryptogramPaymentModel::class,
                    'https://api.cloudpayments.ru/payments/cards/auth',
                ],

            FindSubscriptionRequest::class => [
                    FindSubscriptionRequest::class,
                    FindSubscriptionModel::class,
                    'https://api.cloudpayments.ru/subscriptions/find',
                ],

            GetSubscriptionRequest::class => [
                    GetSubscriptionRequest::class,
                    GetSubscriptionModel::class,
                    'https://api.cloudpayments.ru/subscriptions/get',
                ],

            TestRequest::class => [
                    TestRequest::class,
                    NullModel::class,
                    'https://api.cloudpayments.ru/test',
                ],

            TokenPaymentOneStepRequest::class => [
                    TokenPaymentOneStepRequest::class,
                    TokenPaymentModel::class,
                    'https://api.cloudpayments.ru/payments/tokens/charge',
                ],

            TokenPaymentTwoStepRequest::class => [
                    TokenPaymentTwoStepRequest::class,
                    TokenPaymentModel::class,
                    'https://api.cloudpayments.ru/payments/tokens/auth',
                ],

            UpdateSubscriptionRequest::class => [
                    UpdateSubscriptionRequest::class,
                    UpdateSubscriptionModel::class,
                    'https://api.cloudpayments.ru/subscriptions/update',
                ],
            CancelPaymentRequest::class      => [
                    CancelPaymentRequest::class,
                    CancelPaymentModel::class,
                    'https://api.cloudpayments.ru/payments/void',
                ],
            RefundPaymentRequest::class      => [
                    RefundPaymentRequest::class,
                    RefundPaymentModel::class,
                    'https://api.cloudpayments.ru/payments/refund',
                ],
        ];
    }

    /**
     * @dataProvider dataProvider
     *
     * @param string $request_class_name
     * @param string $model_class_name
     * @param string $url
     */
    public function testGetUrl(string $request_class_name, string $model_class_name, string $url)
    {
        /** @var RequestInterface $request */
        $request = $request_class_name::create();
        $this->assertSame($url, $request->getUrl());
        $this->assertInstanceOf($model_class_name, $request->getModel());
    }
}
