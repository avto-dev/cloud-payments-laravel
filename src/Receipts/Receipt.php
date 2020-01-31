<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Receipts;

use AvtoDev\CloudPayments\References\TaxationSystem;

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
     * @return Item[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param Item[] $items
     *
     * @return $this
     */
    public function setItems(array $items): self
    {
        $this->items = $items;

        return $this;
    }

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
     * @return string|null
     */
    public function getCalculationPlace(): ?string
    {
        return $this->calculation_place;
    }

    /**
     * @param string|null $calculation_place
     *
     * @return $this
     */
    public function setCalculationPlace(?string $calculation_place): self
    {
        $this->calculation_place = $calculation_place;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getTaxationSystem(): ?int
    {
        return $this->taxation_system;
    }

    /**
     * @param int|null $taxation_system
     *
     * @return $this
     */
    public function setTaxationSystem(?int $taxation_system): self
    {
        $this->taxation_system = $taxation_system;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
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
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string|null $phone
     *
     * @return $this
     */
    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsBso(): ?bool
    {
        return $this->is_bso;
    }

    /**
     * @param bool|null $is_bso
     *
     * @return $this
     */
    public function setIsBso(?bool $is_bso): self
    {
        $this->is_bso = $is_bso;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getElectronicAmount(): ?float
    {
        return $this->electronic_amount;
    }

    /**
     * @param float|null $electronic_amount
     *
     * @return $this
     */
    public function setElectronicAmount(?float $electronic_amount): self
    {
        $this->electronic_amount = $electronic_amount;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getAdvancePaymentAmount(): ?float
    {
        return $this->advance_payment_amount;
    }

    /**
     * @param float|null $advance_payment_amount
     *
     * @return $this
     */
    public function setAdvancePaymentAmount(?float $advance_payment_amount): self
    {
        $this->advance_payment_amount = $advance_payment_amount;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getCreditAmount(): ?float
    {
        return $this->credit_amount;
    }

    /**
     * @param float|null $credit_amount
     *
     * @return $this
     */
    public function setCreditAmount(?float $credit_amount): self
    {
        $this->credit_amount = $credit_amount;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getProvisionAmount(): ?float
    {
        return $this->provision_amount;
    }

    /**
     * @param float|null $provision_amount
     *
     * @return $this
     */
    public function setProvisionAmount(?float $provision_amount): self
    {
        $this->provision_amount = $provision_amount;

        return $this;
    }

    /**
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
        ], static function ($value) {
            return $value !== null;
        });
    }
}
