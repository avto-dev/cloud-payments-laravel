<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Traits\ModelFeature;

trait FillObjectFromArray
{
    /**
     * Filling an object from an array
     *
     * @param array $data
     */
    public function fillObjectFromArray(array $data): void
    {
        foreach ($data as $name => $value) {
            $setter = sprintf('set%s', ucfirst($name));
            if (method_exists($this, $setter)) {
                $this->$setter($value);
            }
        }
    }
}
