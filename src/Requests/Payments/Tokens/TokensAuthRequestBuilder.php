<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Requests\Payments\Tokens;

use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\UriInterface;
use AvtoDev\CloudPayments\Requests\Traits\HasReceipt;
use AvtoDev\CloudPayments\Requests\AbstractRequestBuilder;
use AvtoDev\CloudPayments\Requests\Traits\PaymentRequestTrait;

/**
 * @see https://developers.cloudpayments.ru/#oplata-po-tokenu-rekarring
 */
class TokensAuthRequestBuilder extends AbstractRequestBuilder
{
    use PaymentRequestTrait, HasReceipt;

    /**
     * Card tokens issued by the CloudPayments. You get it with the first successful payment.
     *
     * @var string
     */
    protected string $token;

    /**
     * Integer flag of the initiator of the transaction.
     *
     * Possible values:
     *   0 - transaction initiated by the merchant based on previously saved credentials;
     *   1 - transaction initiated by the cardholder (customer) based on previously saved credentials.
     *
     * @var int
     */
    protected int $tr_initiator_code;

    /**
     * Required.
     *
     * @param string $token
     *
     * @return $this
     */
    public function setToken(string $token): self
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Set the integer flag of the initiator of the transaction.
     */
    public function setTransactionInitiatorCode(int $tr_initiator_code): self
    {
        $this->tr_initiator_code = $tr_initiator_code;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    protected function getRequestPayload(): array
    {
        $this->json_data = \array_merge($this->json_data ?? [], $this->getReceiptData());

        return \array_merge($this->getCommonPaymentParams(), [
            'Token'           => $this->token,
            'TrInitiatorCode' => $this->tr_initiator_code,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    protected function getUri(): UriInterface
    {
        return new Uri('/payments/tokens/auth');
    }
}
