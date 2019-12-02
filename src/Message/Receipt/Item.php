<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Receipt;

use AvtoDev\CloudPayments\Message\Reference\Vat;
use AvtoDev\CloudPayments\Message\Reference\PaymentType;
use AvtoDev\CloudPayments\Message\Reference\PaymentObject;

class Item
{
    /**
     * Product name
     *
     * @var string
     */
    protected $label;

    /**
     * Price.
     *
     * @var float
     */
    protected $price;

    /**
     * Quantity
     *
     * @var float
     */
    protected $quantity;

    /**
     * Amount.
     *
     * @var float
     */
    protected $amount;

    /**
     * VAT rate.
     *
     * @see Vat
     *
     * @var int|null
     */
    protected $vat;

    /**
     * A sign of a calculation method is a sign of a calculation method.
     *
     * @see PaymentType
     *
     * @var int
     */
    protected $method;

    /**
     * Sign of the subject of calculation - a sign of the subject of goods, work, services, payment, payment, other subject of calculation.
     *
     * @see PaymentObject
     *
     * @var int
     */
    protected $object;

    /**
     * Unit of measurement.
     *
     * @var string
     */
    protected $measurement_unit;

    /**
     * Product name.
     *
     * @param string $label
     *
     * @return Item
     */
    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Price.
     *
     * @param float $price
     *
     * @return Item
     */
    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Quantity.
     *
     * @param float $quantity
     *
     * @return Item
     */
    public function setQuantity(float $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Amount.
     *
     * @param float $amount
     *
     * @return Item
     */
    public function setAmount(float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * VAT rate.
     *
     * @param int|null $vat
     *
     * @return Item
     */
    public function setVat(?int $vat): self
    {
        $this->vat = $vat;

        return $this;
    }

    /**
     * A sign of a calculation method is a sign of a calculation method.
     *
     * @param int $method
     *
     * @see PaymentType
     *
     * @return Item
     */
    public function setMethod(int $method): self
    {
        $this->method = $method;

        return $this;
    }

    /**
     * Sign of the subject of calculation - a sign of the subject of goods, work, services, payment, payment, other subject of calculation.
     *
     * @param int $object
     *
     * @return Item
     */
    public function setObject(int $object): self
    {
        $this->object = $object;

        return $this;
    }

    /**
     * Unit of measurement.
     *
     * @param string $measurement_unit
     *
     * @return Item
     */
    public function setMeasurementUnit(string $measurement_unit): self
    {
        $this->measurement_unit = $measurement_unit;

        return $this;
    }

    /**
     * Converting the object to an array using the `array_filter` function to remove empty items
     *
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
        ]);
    }
}
