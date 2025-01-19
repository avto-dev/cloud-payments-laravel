<?php

declare(strict_types=1);

namespace AvtoDev\CloudPayments\Requests\Payments\Cards;

use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\UriInterface;
use AvtoDev\CloudPayments\Requests\Traits\HasReceipt;
use AvtoDev\CloudPayments\Requests\AbstractRequestBuilder;
use AvtoDev\CloudPayments\Requests\Traits\PaymentRequestTrait;

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
     * Save card.
     *
     * Card token saving flag for making payment using saved card
     *
     * @var bool
     */
    protected $save_card;

    /**
     * Payment Url.
     *
     * The address of the site from which the checkout script is called
     *
     * @var string
     */
    protected $payment_url;

    /**
     * The primary language in which the API issues messages to the user.
     *
     * Default is Russian.
     * 
     * @see CultureName
     *
     * @var string
     */
    protected $culture_name;

    /**
     * @see Payer
     * 
     * @var array<mixed>
     */
    protected array $payer = [];

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
     * @param string $save_card
     *
     * @return CardsAuthRequestBuilder
     */
    public function setSaveCard(bool $save_card): self
    {
        $this->save_card = $save_card;

        return $this;
    }

    /**
     * @param string $payment_url
     *
     * @return CardsAuthRequestBuilder
     */
    public function setPaymentUrl(string $payment_url): self
    {
        $this->payment_url = $payment_url;

        return $this;
    }

    /**
     * Required.
     *
     * @param string $culture_name
     *
     * @return CardsAuthRequestBuilder
     */
    public function setCultureName(string $culture_name): self
    {
        $this->culture_name = $culture_name;

        return $this;
    }

    /**
     * @param array<mixed> $payer
     *
     * @return CardsAuthRequestBuilder
     */
    public function setPayer(array $payer): self
    {
        $this->payer = $payer;

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
     */
    protected function getRequestPayload(): array
    {
        $this->json_data = \array_merge($this->json_data ?? [], $this->getReceiptData());

        return \array_merge($this->getCommonPaymentParams(), [
            'Name'                 => $this->name,
            'SaveCard'             => $this->save_card,
            'PaymentUrl'           => $this->payment_url,
            'CultureName'          => $this->culture_name,
            'CardCryptogramPacket' => $this->card_cryptogram_packet,
            'Payer'                => !empty($this->payer) ? $this->payer : null,
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
