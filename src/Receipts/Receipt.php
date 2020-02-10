<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Receipts;

use AvtoDev\CloudPayments\References\TaxationSystem;

/**
 * @see https://developers.cloudpayments.ru/#format-peredachi-dannyh-dlya-onlayn-cheka
 */
class Receipt
{
    /**
     * @var Item[]
     */
    protected $items = [];

    /**
     * @var string|null
     */
    protected $calculation_place;

    /**
     * @see TaxationSystem
     *
     * @var int|null
     */
    protected $taxation_system;

    /**
     * @var string|null
     */
    protected $email;

    /**
     * @var string|null
     */
    protected $phone;

    /**
     * Strict accountability form.
     *
     * @var bool|null
     */
    protected $is_bso;

    /**
     * @var float|null
     */
    protected $electronic_amount;

    /**
     * @var float|null
     */
    protected $advance_payment_amount;

    /**
     * @var float|null
     */
    protected $credit_amount;

    /**
     * @var float|null
     */
    protected $provision_amount;

    /**
     * @param Item $item
     *
     * @return $this
     */
    public function addItem(Item $item): self
    {
        $this->items[] = $item;

        return $this;
    }

    /**
     * @param string $calculation_place
     *
     * @return $this
     */
    public function setCalculationPlace(string $calculation_place): self
    {
        $this->calculation_place = $calculation_place;

        return $this;
    }

    /**
     * @param int $taxation_system
     *
     * @return $this
     */
    public function setTaxationSystem(int $taxation_system): self
    {
        $this->taxation_system = $taxation_system;

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
     * @param string $phone
     *
     * @return $this
     */
    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @param bool $is_bso
     *
     * @return $this
     */
    public function setIsBso(bool $is_bso): self
    {
        $this->is_bso = $is_bso;

        return $this;
    }

    /**
     * @param float $electronic_amount
     *
     * @return $this
     */
    public function setElectronicAmount(float $electronic_amount): self
    {
        $this->electronic_amount = $electronic_amount;

        return $this;
    }

    /**
     * @param float $advance_payment_amount
     *
     * @return $this
     */
    public function setAdvancePaymentAmount(float $advance_payment_amount): self
    {
        $this->advance_payment_amount = $advance_payment_amount;

        return $this;
    }

    /**
     * @param float $credit_amount
     *
     * @return $this
     */
    public function setCreditAmount(float $credit_amount): self
    {
        $this->credit_amount = $credit_amount;

        return $this;
    }

    /**
     * @param float $provision_amount
     *
     * @return $this
     */
    public function setProvisionAmount(float $provision_amount): self
    {
        $this->provision_amount = $provision_amount;

        return $this;
    }

    /**
     * @return array<string, array<mixed>|bool|int|string|null>
     */
    public function toArray(): array
    {
        $receipt_items = [];
        foreach ($this->items as $receipt_item) {
            $receipt_items[] = $receipt_item->toArray();
        }

        return \array_filter([
            'Items'            => $receipt_items,
            'calculationPlace' => $this->calculation_place,
            'taxationSystem'   => $this->taxation_system,
            'email'            => $this->email,
            'phone'            => $this->phone,
            'isBso'            => $this->is_bso,
            'amounts'          => [
                'electronic'     => \number_format((float) $this->electronic_amount, 2, '.', ''),
                'advancePayment' => \number_format((float) $this->advance_payment_amount, 2, '.', ''),
                'credit'         => \number_format((float) $this->credit_amount, 2, '.', ''),
                'provision'      => \number_format((float) $this->provision_amount, 2, '.', ''),
            ],
        ], static function ($value) {
            return $value !== null;
        });
    }
}
