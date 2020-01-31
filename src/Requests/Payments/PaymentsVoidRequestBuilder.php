<?php

namespace AvtoDev\CloudPayments\Requests\Payments;

use AvtoDev\CloudPayments\Requests\AbstractRequestBuilder;
use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\UriInterface;

class PaymentsVoidRequestBuilder extends AbstractRequestBuilder
{
    /**
     * Required.
     *
     * @var int
     */
    protected $transaction_id;

    /**
     * Required.
     *
     * @return int
     */
    public function getTransactionId(): int
    {
        return $this->transaction_id;
    }

    /**
     * Required.
     *
     * @param int $transaction_id
     *
     * @return PaymentsVoidRequestBuilder
     */
    public function setTransactionId(int $transaction_id): self
    {
        $this->transaction_id = $transaction_id;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    protected function getRequestParams(): array
    {
        return [
            'TransactionId' => $this->transaction_id,
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getUri(): UriInterface
    {
        return new Uri('/payments/void');
    }
}
