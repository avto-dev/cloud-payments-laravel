<?php

namespace AvtoDev\CloudPayments\Requests\Subscriptions;

use AvtoDev\CloudPayments\Requests\AbstractRequestBuilder;
use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\UriInterface;

/**
 * @see https://developers.cloudpayments.ru/#zapros-informatsii-o-podpiske
 */
class SubscriptionsGetRequestBuilder extends AbstractRequestBuilder
{
    /**
     * Required.
     *
     * @var string|null
     */
    protected $id;

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string|null $id
     *
     * @return SubscriptionsGetRequestBuilder
     */
    public function setId(?string $id): self
    {
        $this->id = $id;

        return $this;
    }

    protected function getRequestParams(): array
    {
        return [
            'Id' => $this->id,
        ];
    }

    protected function getUri(): UriInterface
    {
        return new Uri('/subscriptions/get');
    }
}
