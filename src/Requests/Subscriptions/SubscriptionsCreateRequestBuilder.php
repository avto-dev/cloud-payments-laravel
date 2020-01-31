<?php

namespace AvtoDev\CloudPayments\Requests\Subscriptions;

use AvtoDev\CloudPayments\Receipts\Receipt;
use AvtoDev\CloudPayments\References\Currency;
use AvtoDev\CloudPayments\References\Interval;
use AvtoDev\CloudPayments\Requests\AbstractRequestBuilder;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\UriInterface;
use Psy\Util\Json;

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
     * @var Carbon|null
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
     * @return string|null
     */
    public function getToken(): ?string
    {
        return $this->token;
    }

    /**
     * Required.
     *
     * @param string|null $token
     *
     * @return $this
     */
    public function setToken(?string $token): self
    {
        $this->token = $token;

        return $this;
    }

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
     * @param string|null $account_id
     *
     * @return $this
     */
    public function setAccountId(?string $account_id): self
    {
        $this->account_id = $account_id;

        return $this;
    }

    /**
     * Required.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Required.
     *
     * @param string|null $description
     *
     * @return $this
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Required.
     *
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * Required.
     *
     * @param string|null $email
     *
     * @return $this
     */
    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Required.
     *
     * @return float|null
     */
    public function getAmount(): ?float
    {
        return $this->amount;
    }

    /**
     * Required.
     *
     * @param float|null $amount
     *
     * @return $this
     */
    public function setAmount(?float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Required.
     *
     * @return string|null
     */
    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    /**
     * Required.
     *
     * @param string|null $currency
     *
     * @return $this
     */
    public function setCurrency(?string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Required.
     *
     * @return bool|null
     */
    public function getRequireConfirmation(): ?bool
    {
        return $this->require_confirmation;
    }

    /**
     * Required.
     *
     * @param bool|null $require_confirmation
     *
     * @return $this
     */
    public function setRequireConfirmation(?bool $require_confirmation): self
    {
        $this->require_confirmation = $require_confirmation;

        return $this;
    }

    /**
     * Required.
     *
     * @return Carbon|null
     */
    public function getStartDate(): ?Carbon
    {
        return $this->start_date;
    }

    /**
     * Required.
     *
     * @param Carbon|null $start_date
     *
     * @return $this
     */
    public function setStartDate(?Carbon $start_date): self
    {
        if ($start_date instanceof Carbon) {
            $start_date = clone $start_date;
        }

        $this->start_date = $start_date;

        return $this;
    }

    /**
     * Required.
     *
     * @return string|null
     */
    public function getInterval(): ?string
    {
        return $this->interval;
    }

    /**
     * Required.
     *
     * @param string|null $interval
     *
     * @return $this
     */
    public function setInterval(?string $interval): self
    {
        $this->interval = $interval;

        return $this;
    }

    /**
     * Required.
     *
     * @return int|null
     */
    public function getPeriod(): ?int
    {
        return $this->period;
    }

    /**
     * Required.
     *
     * @param int|null $period
     *
     * @return $this
     */
    public function setPeriod(?int $period): self
    {
        $this->period = $period;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getMaxPeriods(): ?int
    {
        return $this->max_periods;
    }

    /**
     * @param int|null $max_periods
     *
     * @return $this
     */
    public function setMaxPeriods(?int $max_periods): self
    {
        $this->max_periods = $max_periods;

        return $this;
    }

    /**
     * @return Receipt|null
     */
    public function getCustomerReceipt(): ?Receipt
    {
        return $this->customer_receipt;
    }

    /**
     * @param Receipt|null $customer_receipt
     *
     * @return $this
     */
    public function setCustomerReceipt(?Receipt $customer_receipt): self
    {
        $this->customer_receipt = $customer_receipt;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    protected function getRequestParams(): array
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
                ? $this->start_date->toRfc3339String()
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
