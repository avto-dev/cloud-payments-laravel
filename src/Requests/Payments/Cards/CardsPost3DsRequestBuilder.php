<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Requests\Payments\Cards;

use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\UriInterface;
use AvtoDev\CloudPayments\Requests\AbstractRequestBuilder;

/**
 * @see https://developers.cloudpayments.ru/#obrabotka-3-d-secure
 */
class CardsPost3DsRequestBuilder extends AbstractRequestBuilder
{
    /**
     * MD parameter value.
     *
     * @var int
     */
    protected $transaction_id;

    /**
     * PaRes parameter value.
     *
     * @var string
     */
    protected $pa_res;

    /**
     * MD parameter value.
     *
     * @param int $transaction_id
     *
     * @return CardsPost3DsRequestBuilder
     */
    public function setTransactionId(int $transaction_id): self
    {
        $this->transaction_id = $transaction_id;

        return $this;
    }

    /**
     * PaRes parameter value.
     *
     * @param string $pa_res
     *
     * @return CardsPost3DsRequestBuilder
     */
    public function setPaRes(string $pa_res): self
    {
        $this->pa_res = $pa_res;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    protected function getRequestPayload(): array
    {
        return [
            'TransactionId' => $this->transaction_id,
            'PaRes'         => $this->pa_res,
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getUri(): UriInterface
    {
        return new Uri('/payments/cards/post3ds');
    }
}
