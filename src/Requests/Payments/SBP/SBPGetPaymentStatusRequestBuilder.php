<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Requests\Payments\SBP;

use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\UriInterface;
use AvtoDev\CloudPayments\Requests\AbstractRequestBuilder;

class SBPGetPaymentStatusRequestBuilder extends AbstractRequestBuilder
{
    /**
     * Required.
     */
    private ?int $transaction_id = null;

    /**
     * Required.
     *
     * @param int $transaction_id
     *
     * @return SBPGetPaymentStatusRequestBuilder
     */
    public function setTransactionId(int $transaction_id): self
    {
        $this->transaction_id = $transaction_id;

        return $this;
    }

    /**
     * @inheritdoc
     */
    protected function getRequestPayload(): array
    {
        return [
            'TransactionId' => $this->transaction_id,
        ];
    }

    /**
     * @inheritdoc
     */
    protected function getUri(): UriInterface
    {
        return new Uri('/payments/qr/status/get');
    }
}
