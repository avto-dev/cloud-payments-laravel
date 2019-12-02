<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Message\Response\Model;

use Faker\Factory;
use AvtoDev\CloudPayments\Message\Response\Model\ApplePayStartSessionModel;
use PHPUnit\Framework\TestCase;

/**
 * @group unit
 * @group apple-pay-start-session-model
 *
 * @covers \AvtoDev\CloudPayments\Message\Response\Model\ApplePayStartSessionModel
 */
class ApplePayStartSessionModelTest extends TestCase
{
    /** @var \Faker\Generator */
    protected $faker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->faker = Factory::create();
    }

    public function testToArray()
    {
        $model = new ApplePayStartSessionModel;

        $data = [
            'epochTimestamp'            => 1545111111153,
            'expiresAt'                 => 1545111111153,
            'merchantSessionIdentifier' => 'SSH6FE83F9B853E00F7BD17260001DCF910_0001B0D00068F71D5887F2726CFD997A28E0ED57ABDACDA64934730A24A31583',
            'nonce'                     => 'd6358e06',
            'merchantIdentifier'        => '41B8000198128F7CC4295E03092BE5E287738FD77EC3238789846AC8EF73FCD8',
            'domainName'                => 'demo.cloudpayments.ru',
            'displayName'               => 'demo.cloudpayments.ru',
            'signature'                 => '308006092a864886f70d010702a0803080020101310f300d06096086480165030402010',
        ];

        $model->fillObjectFromArray($data);

        $this->assertSame($data, $model->toArray());
    }
}
