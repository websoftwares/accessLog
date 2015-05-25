<?php

namespace Websoftwares\Tests\AccessLog;

use Websoftwares\AccessLog\LogFormatFactory;
use Websoftwares\AccessLog\Log;

/**
 * Class LogTest.
 */
class LogTest extends \PHPUnit_Framework_TestCase
{
    protected $request;
    protected $response;
    protected $logger;
    protected $logFormat;
    protected $log;

    public function setUp()
    {
        $this->request = (new RequestResponseFactory())->newRequest();
        $this->response = (new RequestResponseFactory())->newResponse();
        $this->logger = $this->getMock('Psr\Log\LoggerInterface');
        $this->logFormat = (new LogFormatFactory())->combinedLog();
        $this->log = new Log($this->logger, $this->logFormat);
    }

    public function testInstantiateAsObjectSucceeds()
    {
        $this->assertInstanceOf('Websoftwares\AccessLog\Log', $this->log);
    }

    public function testInvokeSucceeds()
    {
        $this->logger->expects($this->once())->method('info')
            ->will($this->returnValue(null));

        $actual = $this->log;
        $this->assertNull($actual($this->request, $this->response));
    }

    /**
     * testInvokeFailsOnException.
     */
    public function testInvokeFailsOnException()
    {
        $exception = new \Exception('test', 1);

        $this->logger->expects($this->once())->method('info')
            ->will($this->throwException($exception));

        $this->logger->expects($this->once())->method('error')
            ->will($this->returnValue(null));
        $actual = $this->log;
        $this->assertNull($actual($this->request, $this->response));
    }
}
