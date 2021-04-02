<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Requests\Traits;

trait PaymentRequestTrait
{
    /**
     * Required.
     *
     * @var float
     */
    protected $amount;

    /**
     * Required.
     *
     * @see Currency
     *
     * @var string
     */
    protected $currency;

    /**
     * Required.
     *
     * @var string
     */
    protected $ip_address;

    /**
     * @var string|null
     */
    protected $invoice_id;

    /**
     * @var string|null
     */
    protected $description;

    /**
     * Required if subscription or payment token needed.
     *
     * @var string|null
     */
    protected $account_id;

    /**
     * @var string|null
     */
    protected $email;

    /**
     * Any other data that will be associated with the transaction, including instructions for creating a subscription
     * or generating an online check. We have reserved the names of the following parameters and display their contents
     * in the registry of operations uploaded to the Personal Account: name, firstName, middleName, lastName, nick,
     * phone, address, comment, birthDate.
     *
     * @var array<mixed>|null
     */
    protected $json_data;

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
     * Required.
     *
     * @param string $currency
     *
     * @return $this
     */
    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Required.
     *
     * @param string $ip_address
     *
     * @return $this
     */
    public function setIpAddress(string $ip_address): self
    {
        $this->ip_address = $ip_address;

        return $this;
    }

    /**
     * @param string $invoice_id
     *
     * @return $this
     */
    public function setInvoiceId(string $invoice_id): self
    {
        $this->invoice_id = $invoice_id;

        return $this;
    }

    /**
     * @param string $description
     *
     * @return $this
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @param string $email
     *
     * @return $this
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Required if subscription or payment token needed.
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
     * Any other data that will be associated with the transaction, including instructions for creating a subscription
     * or generating an online check. We have reserved the names of the following parameters and display their contents
     * in the registry of operations uploaded to the Personal Account: name, firstName, middleName, lastName, nick,
     * phone, address, comment, birthDate.
     *
     * @param array<mixed> $json_data
     *
     * @return $this
     */
    public function setJsonData(array $json_data): self
    {
        $this->json_data = $json_data;

        return $this;
    }

    /**
     * @throws \JsonException
     *
     * @return array<string, float|string>
     */
    protected function getCommonPaymentParams(): array
    {
        return \array_filter([
            'Amount'      => $this->amount,
            'Currency'    => $this->currency,
            'IpAddress'   => $this->ip_address,
            'InvoiceId'   => $this->invoice_id,
            'Description' => $this->description,
            'AccountId'   => $this->account_id,
            'Email'       => $this->email,
            'JsonData'    => $this->json_data !== null && $this->json_data !== []
                ? \json_encode($this->json_data,JSON_THROW_ON_ERROR)
                : null,
        ]);
    }
}
