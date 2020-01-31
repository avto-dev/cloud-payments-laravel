<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Requests\Payments\Cards;

use AvtoDev\CloudPayments\Requests\AbstractRequestBuilder;
use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\UriInterface;

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
     * @return int
     */
    public function getTransactionId(): ?int
    {
        return $this->transaction_id;
    }

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
     * @return string
     */
    public function getPaRes(): ?string
    {
        return $this->pa_res;
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
    public function getRequestParams(): array
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
