<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Requests\Subscriptions;

use DateTime;
use Psy\Util\Json;
use DateTimeInterface;
use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\UriInterface;
use AvtoDev\CloudPayments\Receipts\Receipt;
use AvtoDev\CloudPayments\References\Currency;
use AvtoDev\CloudPayments\References\Interval;
use AvtoDev\CloudPayments\Requests\AbstractRequestBuilder;

/**
 * @see https://developers.cloudpayments.ru/#sozdanie-podpiski-na-rekurrentnye-platezhi
 */
class SubscriptionsCreateRequestBuilder extends AbstractRequestBuilder
{
    /**
     * Required.
     *
     * @var string|null
     */
    protected $token;

    /**
     * Required.
     *
     * @var string|null
     */
    protected $account_id;

    /**
     * Required.
     *
     * @var string|null
     */
    protected $description;

    /**
     * Required.
     *
     * @var string|null
     */
    protected $email;

    /**
     * Required.
     *
     * @var float|null
     */
    protected $amount;

    /**
     * Required.
     *
     * @see Currency
     *
     * @var string|null
     */
    protected $currency;

    /**
     * Required.
     *
     * @var bool|null
     */
    protected $require_confirmation;

    /**
     * Required.
     *
     * @var DateTimeInterface|null
     */
    protected $start_date;

    /**
     * Required.
     *
     * @see Interval
     *
     * @var string|null
     */
    protected $interval;

    /**
     * Required.
     *
     * @var int|null
     */
    protected $period;

    /**
     * @var int|null
     */
    protected $max_periods;

    /**
     * @var Receipt|null
     */
    protected $customer_receipt;

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
     * Required.
     *
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
     * Required.
     *
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
     * @param bool $require_confirmation
     *
     * @return $this
     */
    public function setRequireConfirmation(bool $require_confirmation): self
    {
        $this->require_confirmation = $require_confirmation;

        return $this;
    }

    /**
     * Required.
     *
     * @param DateTimeInterface $start_date
     *
     * @return $this
     */
    public function setStartDate(DateTimeInterface $start_date): self
    {
        $this->start_date = clone $start_date;

        return $this;
    }

    /**
     * Required.
     *
     * @param string $interval
     *
     * @return $this
     */
    public function setInterval(string $interval): self
    {
        $this->interval = $interval;

        return $this;
    }

    /**
     * Required.
     *
     * @param int $period
     *
     * @return $this
     */
    public function setPeriod(int $period): self
    {
        $this->period = $period;

        return $this;
    }

    /**
     * @param int $max_periods
     *
     * @return $this
     */
    public function setMaxPeriods(int $max_periods): self
    {
        $this->max_periods = $max_periods;

        return $this;
    }

    /**
     * @param Receipt $customer_receipt
     *
     * @return $this
     */
    public function setCustomerReceipt(Receipt $customer_receipt): self
    {
        $this->customer_receipt = $customer_receipt;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    protected function getRequestPayload(): array
    {
        return [
            'Token'               => $this->token,
            'AccountId'           => $this->account_id,
            'Description'         => $this->description,
            'Email'               => $this->email,
            'Amount'              => $this->amount,
            'Currency'            => $this->currency,
            'RequireConfirmation' => $this->require_confirmation,
            'StartDate'           => $this->start_date
                ? $this->start_date->format(DateTime::RFC3339)
                : null,
            'Interval'            => $this->interval,
            'Period'              => $this->period,
            'MaxPeriods'          => $this->max_periods,
            'CustomerReceipt'     => $this->customer_receipt instanceof Receipt
                ? Json::encode($this->customer_receipt->toArray())
                : null,
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getUri(): UriInterface
    {
        return new Uri('/subscriptions/create');
    }
}
