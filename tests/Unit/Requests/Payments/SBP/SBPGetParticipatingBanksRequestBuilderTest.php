<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Requests\Payments\SBP;

use AvtoDev\Tests\AbstractTestCase;
use AvtoDev\CloudPayments\Requests\Payments\SBP\SBPGetParticipatingBanksRequestBuilder;

/**
 * @covers \AvtoDev\CloudPayments\Requests\Payments\SBP\SBPGetParticipatingBanksRequestBuilder
 */
class SBPGetParticipatingBanksRequestBuilderTest extends AbstractTestCase
{
    public function testSuccessfullyRequestBuilding(): void
    {
        $sut = new SBPGetParticipatingBanksRequestBuilder();

        $request = $sut->buildRequest();

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('https', $request->getUri()->getScheme());
        $this->assertSame('qr.nspk.ru', $request->getUri()->getHost());
        $this->assertSame('/proxyapp/c2bmembers.json', $request->getUri()->getPath());
    }
}
