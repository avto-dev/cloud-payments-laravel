<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Message\Response;

use AvtoDev\CloudPayments\Message\Response\Model\ModelInterface;

abstract class AbstractResponse implements ResponseInterface
{
    /**
     * @var ModelInterface|null
     */
    protected $model;

    /**
     * @var bool
     */
    protected $success = false;

    /**
     * @var string|null
     */
    protected $message;

    /**
     * @var mixed|null
     */
    protected $inner_result;

    /**
     * {@inheritDoc}
     */
    public function fillObjectFromArray(array $data): void
    {
        $this->success = $data['Success'] ?? false;

        if (isset($data['Message'])) {
            $this->message = $data['Message'];
        }

        if (isset($data['InnerResult'])) {
            $this->inner_result = $data['InnerResult'];
        }

        if (isset($data['Model'])) {
            $this->getModel()->fillObjectFromArray($data['Model']);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function getModel(): ModelInterface
    {
        if ($this->model === null) {
            $this->model = $this->createModel();
        }

        return $this->model;
    }

    /**
     * @return ModelInterface
     */
    abstract protected function createModel(): ModelInterface;

    /**
     * {@inheritDoc}
     */
    public function isSuccess(): bool
    {
        return $this->success;
    }

    /**
     * {@inheritDoc}
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * {@inheritDoc}
     */
    public function getInnerResult()
    {
        return $this->inner_result;
    }

    /**
     * {@inheritDoc}
     */
    public function toArray(): array
    {
        return [
            'Model'       => $this->getModel()->toArray(),
            'Success'     => $this->isSuccess(),
            'Message'     => $this->getMessage(),
            'InnerResult' => $this->getInnerResult(),
        ];
    }
}
