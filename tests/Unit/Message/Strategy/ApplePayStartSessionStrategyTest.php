<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Message\Strategy;

use AvtoDev\CloudPayments\Message\Response\ApplePayStartSessionResponse;
use AvtoDev\CloudPayments\Message\Strategy\ApplePayStartSessionStrategy;

/**
 * @group unit
 * @group apple-pay-start-session-strategy
 * @covers \AvtoDev\CloudPayments\Message\Strategy\ApplePayStartSessionStrategy
 */
class ApplePayStartSessionStrategyTest extends AbstractStrategyTest
{
    protected function setUp(): void
    {
        $this->strategy = new ApplePayStartSessionStrategy;
    }

    public function testCorrectResponse(): void
    {
        $raw_response = [
            'Model'   => [
                'epochTimestamp'            => 1545111111153,
                'expiresAt'                 => 1545111111153,
                'merchantSessionIdentifier' => 'SSH6FE83F9B853E00F7BD17260001DCF910_0001B0D00068F71D5887F2726CFD997A28E0ED57ABDACDA64934730A24A31583',
                'nonce'                     => 'd6358e06',
                'merchantIdentifier'        => '41B8000198128F7CC4295E03092BE5E287738FD77EC3238789846AC8EF73FCD8',
                'domainName'                => 'demo.cloudpayments.ru',
                'displayName'               => 'demo.cloudpayments.ru',
                'signature'                 => '308006092a864886f70d010702a0803080020101310f300d06096086480165030402010500308006092a864886f70d0107',
            ],
            'Success' => true,
            'Message' => null,
        ];

        /** @var ApplePayStartSessionResponse $response */
        $response = $this->strategy->prepareRawResponse($raw_response);

        $this->assertTrue($response instanceof ApplePayStartSessionResponse);
        $this->assertTrue($response->isSuccess());
        $this->assertSame($raw_response['Model'], $response->getModel()->toArray());

        $this->assertSame('SSH6FE83F9B853E00F7BD17260001DCF910_0001B0D00068F71D5887F2726CFD997A28E0ED57ABDACDA64934730A24A31583',
            $response->getModel()->getMerchantSessionIdentifier());
    }
}
