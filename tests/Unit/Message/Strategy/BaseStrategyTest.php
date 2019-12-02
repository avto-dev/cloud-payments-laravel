<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Message\Strategy;

use AvtoDev\CloudPayments\Message\Response\InvalidRequestResponse;
use AvtoDev\CloudPayments\Message\Response\ResponseInterface;
use AvtoDev\CloudPayments\Message\Strategy\AbstractStrategy;
use AvtoDev\CloudPayments\Message\Strategy\Exception\ClassNotFoundException;
use AvtoDev\CloudPayments\Message\Strategy\Exception\IsNotInstanceOfException;
use AvtoDev\CloudPayments\Message\Strategy\Exception\StrategyCannotCreateResponseException;
use AvtoDev\CloudPayments\Message\Strategy\Specification\InvalidRequestSpecification;
use AvtoDev\CloudPayments\Message\Strategy\Specification\SpecificationInterface;
use PHPUnit\Framework\TestCase;

/**
 * @group unit
 * @group  base-strategy
 * @covers \AvtoDev\CloudPayments\Message\Strategy\AbstractStrategy
 */
class BaseStrategyTest extends TestCase
{
    public function testSuccessPrepare()
    {
        $strategy                     = new class extends AbstractStrategy {
            protected $specifications = [
                InvalidRequestSpecification::class => InvalidRequestResponse::class,
            ];
        };

        $response = $strategy->prepareRawResponse(['Success' => false, 'Message' => 'Error']);

        $this->assertInstanceOf(InvalidRequestResponse::class, $response);
    }

    public function testClassNotFoundExceptionForSpecification()
    {
        $this->expectException(ClassNotFoundException::class);
        $this->expectExceptionMessage('The class not-found-class is not found');

        $strategy                     = new class extends AbstractStrategy {
            protected $specifications = [
                'not-found-class' => InvalidRequestResponse::class,
            ];
        };

        $strategy->prepareRawResponse(['Success' => false, 'Message' => 'Error']);
    }

    public function testClassNotFoundExceptionForResponse()
    {
        $this->expectException(ClassNotFoundException::class);
        $this->expectExceptionMessage('The class not-found-class is not found');

        $strategy                     = new class extends AbstractStrategy {
            protected $specifications = [
                InvalidRequestSpecification::class => 'not-found-class',
            ];
        };

        $strategy->prepareRawResponse(['Success' => false, 'Message' => 'Error']);
    }

    public function testIsNotInstanceOfSpecificationInterface()
    {
        $this->expectException(IsNotInstanceOfException::class);
        $this->expectExceptionMessage(sprintf(
            'The class %s is not an instance of %s',
            InvalidRequestResponse::class, SpecificationInterface::class
        ));

        $strategy                     = new class extends AbstractStrategy {
            protected $specifications = [
                InvalidRequestResponse::class => InvalidRequestResponse::class,
            ];
        };

        $strategy->prepareRawResponse(['Success' => false, 'Message' => 'Error']);
    }

    public function testIsNotInstanceOfResponseInterface()
    {
        $this->expectException(IsNotInstanceOfException::class);
        $this->expectExceptionMessage(sprintf(
            'The class %s is not an instance of %s',
            InvalidRequestSpecification::class, ResponseInterface::class
        ));

        $strategy                     = new class extends AbstractStrategy {
            protected $specifications = [
                InvalidRequestSpecification::class => InvalidRequestSpecification::class,
            ];
        };

        $strategy->prepareRawResponse(['Success' => false, 'Message' => 'Error']);
    }

    public function testCannotCreateResponseException()
    {
        $this->expectException(StrategyCannotCreateResponseException::class);

        $strategy                     = new class extends AbstractStrategy {
            protected $specifications = [
                InvalidRequestSpecification::class => InvalidRequestResponse::class,
            ];
        };

        $strategy->prepareRawResponse(['Success' => true]);
    }
}
