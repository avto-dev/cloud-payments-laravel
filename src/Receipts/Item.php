<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Receipts;

use AvtoDev\CloudPayments\References\PaymentObject;
use AvtoDev\CloudPayments\References\PaymentType;
use AvtoDev\CloudPayments\References\Vat;

class Item
{
    /**
     * @var string|null
     */
    protected $label;

    /**
     * @var float|null
     */
    protected $price;

    /**
     * @var float|null
     */
    protected $quantity;

    /**
     * @var float|null
     */
    protected $amount;

    /**
     * @see Vat
     *
     * @var int|null
     */
    protected $vat;

    /**
     * @see PaymentType
     *
     * @var int|null
     */
    protected $method;

    /**
     * @see PaymentObject
     *
     * @var int|null
     */
    protected $object;

    /**
     * @var string|null
     */
    protected $measurement_unit;

    /**
     * @return string|null
     */
    public function getLabel(): ?string
    {
        return $this->label;
    }

    /**
     * @param string|null $label
     *
     * @return $this
     */
    public function setLabel(?string $label): self
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getPrice(): ?float
    {
        return $this->price;
    }

    /**
     * @param float|null $price
     *
     * @return $this
     */
    public function setPrice(?float $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getQuantity(): ?float
    {
        return $this->quantity;
    }

    /**
     * @param float|null $quantity
     *
     * @return $this
     */
    public function setQuantity(?float $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getAmount(): ?float
    {
        return $this->amount;
    }

    /**
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
     * @return int|null
     */
    public function getVat(): ?int
    {
        return $this->vat;
    }

    /**
     * @param int|null $vat
     *
     * @return $this
     */
    public function setVat(?int $vat): self
    {
        $this->vat = $vat;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getMethod(): ?int
    {
        return $this->method;
    }

    /**
     * @param int|null $method
     *
     * @return $this
     */
    public function setMethod(?int $method): self
    {
        $this->method = $method;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getObject(): ?int
    {
        return $this->object;
    }

    /**
     * @param int|null $object
     *
     * @return $this
     */
    public function setObject(?int $object): self
    {
        $this->object = $object;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMeasurementUnit(): ?string
    {
        return $this->measurement_unit;
    }

    /**
     * @param string|null $measurement_unit
     *
     * @return $this
     */
    public function setMeasurementUnit(?string $measurement_unit): self
    {
        $this->measurement_unit = $measurement_unit;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return \array_filter([
            'label'           => $this->label,
            'price'           => $this->price,
            'quantity'        => $this->quantity,
            'amount'          => $this->amount,
            'vat'             => $this->vat,
            'method'          => $this->method,
            'object'          => $this->object,
            'measurementUnit' => $this->measurement_unit,
        ], function ($value) {
            return $value !== null;
        });
    }
}
