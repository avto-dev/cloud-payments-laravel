<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Receipt;

use AvtoDev\CloudPayments\Message\Reference\TaxationSystem;

class Receipt
{
    /**
     * Items.
     *
     * @var array|Item[]
     */
    protected $items = [];

    /**
     * Place of settlement, the default value is taken from the cashier.
     *
     * @var string
     */
    protected $calculation_place;

    /**
     * Tax system; optional if you have one tax system.
     *
     * @see TaxationSystem
     *
     * @var int
     */
    protected $taxation_system;

    /**
     * The customer’s email, if you need to send an email with a check.
     *
     * @var string
     */
    protected $email;

    /**
     * The customer’s phone in any format, if you need to send a message with a link to the check.
     *
     * @var string
     */
    protected $phone;

    /**
     * The check is a form of strict reporting.
     *
     * @var bool
     */
    protected $is_bso = false;

    /**
     * The amount of payment by electronic money.
     *
     * @var float
     */
    protected $electronic_amount;

    /**
     * Amount of prepayment (offset by advance) (2 decimal places).
     *
     * @var float
     */
    protected $advance_payment_amount;

    /**
     * Postpay amount (on credit) (2 decimal places).
     *
     * @var float
     */
    protected $credit_amount;

    /**
     * Amount of payment by counter-provision (certificates, other mat. Value) (2 decimal places).
     *
     * @var float
     */
    protected $provision_amount;

    /**
     * Items.
     *
     * @param array $items
     *
     * @return Receipt
     */
    public function setItems(array $items): self
    {
        $this->items = $items;

        return $this;
    }

    /**
     * Place of settlement, the default value is taken from the cashier.
     *
     * @param string $calculation_place
     *
     * @return Receipt
     */
    public function setCalculationPlace(string $calculation_place): self
    {
        $this->calculation_place = $calculation_place;

        return $this;
    }

    /**
     * Tax system; optional if you have one tax system.
     *
     * @param int $taxation_system
     *
     * @return Receipt
     */
    public function setTaxationSystem(int $taxation_system): self
    {
        $this->taxation_system = $taxation_system;

        return $this;
    }

    /**
     * The customer’s email, if you need to send an email with a check.
     *
     * @param string $email
     *
     * @return Receipt
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * The customer’s phone in any format, if you need to send a message with a link to the check.
     *
     * @param string $phone
     *
     * @return Receipt
     */
    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * The check is a form of strict reporting.
     *
     * @param bool $is_bso
     *
     * @return Receipt
     */
    public function setIsBso(bool $is_bso): self
    {
        $this->is_bso = $is_bso;

        return $this;
    }

    /**
     * The amount of payment by electronic money.
     *
     * @param float $electronic_amount
     *
     * @return Receipt
     */
    public function setElectronicAmount(float $electronic_amount): self
    {
        $this->electronic_amount = $electronic_amount;

        return $this;
    }

    /**
     * Amount of prepayment (offset by advance) (2 decimal places).
     *
     * @param float $advance_payment_amount
     *
     * @return Receipt
     */
    public function setAdvancePaymentAmount(float $advance_payment_amount): self
    {
        $this->advance_payment_amount = $advance_payment_amount;

        return $this;
    }

    /**
     * Postpay amount (on credit) (2 decimal places).
     *
     * @param float $credit_amount
     *
     * @return Receipt
     */
    public function setCreditAmount(float $credit_amount): self
    {
        $this->credit_amount = $credit_amount;

        return $this;
    }

    /**
     * Amount of payment by counter-provision (certificates, other mat. Value) (2 decimal places).
     *
     * @param float $provision_amount
     *
     * @return Receipt
     */
    public function setProvisionAmount(float $provision_amount): self
    {
        $this->provision_amount = $provision_amount;

        return $this;
    }

    /**
     * @param Item $item
     *
     * @return Receipt
     */
    public function addItem(Item $item): self
    {
        $this->items[] = $item;

        return $this;
    }

    /**
     * Converting the object to an array using the `array_filter` function to remove empty items.
     *
     * @return array
     */
    public function toArray(): array
    {
        $receipt_items = [];
        foreach ($this->items as $receipt_item) {
            if ($receipt_item instanceof Item) {
                $receipt_items[] = $receipt_item->toArray();
            }
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
        ]);
    }
}
