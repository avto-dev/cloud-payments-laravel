<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Requests\Subscriptions;

use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\UriInterface;
use AvtoDev\CloudPayments\Requests\AbstractRequestBuilder;

/**
 * @see https://developers.cloudpayments.ru/#otmena-podpiski-na-rekurrentnye-platezhi
 */
class SubscriptionsCancelRequestBuilder extends AbstractRequestBuilder
{
    /**
     * Required.
     *
     * @var string|null
     */
    protected $id;

    /**
     * Required.
     *
     * @param string $id
     *
     * @return SubscriptionsCancelRequestBuilder
     */
    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    protected function getRequestPayload(): array
    {
        return [
            'Id' => $this->id,
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getUri(): UriInterface
    {
        return new Uri('/subscriptions/cancel');
    }
}
