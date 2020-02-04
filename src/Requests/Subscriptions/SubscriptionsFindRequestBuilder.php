<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Requests\Subscriptions;

use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\UriInterface;
use AvtoDev\CloudPayments\Requests\AbstractRequestBuilder;

/**
 * @see https://developers.cloudpayments.ru/#poisk-podpisok
 */
class SubscriptionsFindRequestBuilder extends AbstractRequestBuilder
{
    /**
     * Required.
     *
     * @var string|null
     */
    protected $account_id;

    /**
     * Required.
     *
     * @return string|null
     */
    public function getAccountId(): ?string
    {
        return $this->account_id;
    }

    /**
     * Required.
     *
     * @param string $account_id
     *
     * @return $this
     */
    public function setAccountId(string $account_id): self
    {
        $this->account_id = $account_id;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    protected function getRequestPayload(): array
    {
        return [
            'AccountId' => $this->account_id,
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getUri(): UriInterface
    {
        return new Uri('/subscriptions/find');
    }
}
