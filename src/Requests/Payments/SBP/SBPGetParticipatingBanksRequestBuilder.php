<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Requests\Payments\SBP;

use GuzzleHttp\Psr7\Uri;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\RequestInterface;

class SBPGetParticipatingBanksRequestBuilder
{
    /**
     * @return RequestInterface
     */
    public function buildRequest(): RequestInterface
    {
        return new Request('GET', new Uri('https://qr.nspk.ru/proxyapp/c2bmembers.json'));
    }
}
