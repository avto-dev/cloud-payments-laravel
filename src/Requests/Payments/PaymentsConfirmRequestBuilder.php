<?php

namespace AvtoDev\CloudPayments\Requests\Payments;

use AvtoDev\CloudPayments\Requests\AbstractRequestBuilder;
use AvtoDev\CloudPayments\Requests\Traits\HasReceipt;
use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\UriInterface;
use Tarampampam\Wrappers\Exceptions\JsonEncodeDecodeException;
use Tarampampam\Wrappers\Json;

/**
 * @see https://developers.cloudpayments.ru/#podtverzhdenie-oplaty
 */
class PaymentsConfirmRequestBuilder extends AbstractRequestBuilder
{
    use HasReceipt;

    /**
     * Required.
     *
     * @var int
     */
    protected $transaction_id;

    /**
     * Required.
     *
     * @var float
     */
    protected $amount;

    /**
     * @var array
     */
    protected $json_data;

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
     * @return $this
     */
    public function setTransactionId(int $transaction_id): self
    {
        $this->transaction_id = $transaction_id;

        return $this;
    }

    /**
     * Required.
     *
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * Required.
     *
     * @param float $amount
     *
     * @return $this
     */
    public function setAmount(float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return array
     */
    public function getJsonData(): array
    {
        return $this->json_data ?? [];
    }

    /**
     * @param array $json_data
     *
     * @return $this
     */
    public function setJsonData(array $json_data): self
    {
        $this->json_data = $json_data;

        return $this;
    }

    /**
     * {@inheritdoc}
     *
     * @throws JsonEncodeDecodeException
     */
    protected function getRequestParams(): array
    {
        $this->json_data = \array_merge($this->json_data ?? [], $this->getReceiptData());

        return [
            'TransactionId' => $this->transaction_id,
            'Amount'        => $this->amount,
            'JsonData'      => $this->json_data !== null && $this->json_data !== []
                ? Json::encode($this->json_data)
                : null,
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getUri(): UriInterface
    {
        return new Uri('/payments/confirm');
    }
}
