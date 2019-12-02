<?php

declare(strict_types = 1);

namespace AvtoDev\Tests\Unit\Message\Response;

use AvtoDev\CloudPayments\Message\Response\AbstractResponse;
use AvtoDev\CloudPayments\Message\Response\Model\ModelInterface;
use AvtoDev\CloudPayments\Message\Response\Model\NullModel;
use AvtoDev\CloudPayments\Message\Response\ResponseInterface;
use PHPUnit\Framework\TestCase;

/**
 * @group  unit
 * @group  abstract-response
 * @covers \AvtoDev\CloudPayments\Message\Response\AbstractResponse
 */
class AbstractResponseTest extends TestCase
{
    /** @var ResponseInterface */
    protected $response;

    protected function setUp(): void
    {
        parent::setUp();

        $this->response = new class extends AbstractResponse {
            public function createModel(): ModelInterface
            {
                return new NullModel;
            }
        };
    }

    /**
     * @cover ::fillObjectFromArray
     * @cover ::isSuccess
     * @cover ::getMessage
     * @cover ::getInnerResult
     * @cover ::toArray
     */
    public function test()
    {
        $data = [
            'Model'       => [],
            'Success'     => true,
            'Message'     => 'Message',
            'InnerResult' => 'InnerResult',
        ];

        $this->response->fillObjectFromArray($data);

        $this->assertSame(true, $this->response->isSuccess());
        $this->assertSame('Message', $this->response->getMessage());
        $this->assertSame('InnerResult', $this->response->getInnerResult());
        $this->assertInstanceOf(NullModel::class, $this->response->getModel());

        sort($data);
        $result = $this->response->toArray();
        sort($result);

        $this->assertSame($data, $result);
    }
}
