<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Requests\Payments\Cards;

use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\UriInterface;
use AvtoDev\CloudPayments\Requests\Traits\HasReceipt;
use AvtoDev\CloudPayments\Requests\AbstractRequestBuilder;
use AvtoDev\CloudPayments\Requests\Traits\PaymentRequestTrait;
use Tarampampam\Wrappers\Exceptions\JsonEncodeDecodeException;

/**
 * @see https://developers.cloudpayments.ru/#oplata-po-kriptogramme
 */
class CardsAuthRequestBuilder extends AbstractRequestBuilder
{
    use PaymentRequestTrait, HasReceipt;

    /**
     * Card holder name.
     *
     * Required if not ApplePay or GPay
     *
     * @var string
     */
    protected $name;

    /**
     * Cryptogram.
     *
     * Required
     *
     * @var string
     */
    protected $card_cryptogram_packet;

    /**
     * @param string $name
     *
     * @return CardsAuthRequestBuilder
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param string $card_cryptogram_packet
     *
     * @return CardsAuthRequestBuilder
     */
    public function setCardCryptogramPacket(string $card_cryptogram_packet): self
    {
        $this->card_cryptogram_packet = $card_cryptogram_packet;

        return $this;
    }

    /**
     * {@inheritdoc}
     *
     * @throws JsonEncodeDecodeException
     */
    protected function getRequestPayload(): array
    {
        $this->json_data = \array_merge($this->json_data ?? [], $this->getReceiptData());

        return \array_merge($this->getCommonPaymentParams(), [
            'Name'                 => $this->name,
            'CardCryptogramPacket' => $this->card_cryptogram_packet,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    protected function getUri(): UriInterface
    {
        return new Uri('/payments/cards/auth');
    }
}
