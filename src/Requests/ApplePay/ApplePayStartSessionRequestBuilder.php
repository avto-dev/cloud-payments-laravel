<?php

namespace AvtoDev\CloudPayments\Requests\ApplePay;

use AvtoDev\CloudPayments\Requests\AbstractRequestBuilder;
use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\UriInterface;

/**
 * @see https://developers.cloudpayments.ru/#zapusk-sessii-dlya-oplaty-cherez-apple-pay
 */
class ApplePayStartSessionRequestBuilder extends AbstractRequestBuilder
{
    /**
     * @var string
     */
    protected $validation_url;

    /**
     * @return string
     */
    public function getValidationUrl(): string
    {
        return $this->validation_url;
    }

    /**
     * @param string $validation_url
     *
     * @return ApplePayStartSessionRequestBuilder
     */
    public function setValidationUrl(string $validation_url): self
    {
        $this->validation_url = $validation_url;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    protected function getRequestParams(): array
    {
        return ['ValidationUrl' => $this->validation_url];
    }

    /**
     * {@inheritdoc}
     */
    protected function getUri(): UriInterface
    {
        return new Uri('/applepay/startsession');
    }
}
