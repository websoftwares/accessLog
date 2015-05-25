<?php

namespace Websoftwares\Tests\AccessLog;

use Websoftwares\AccessLog\LogFormat;

/**
 * Class LogFormatTest.
 */
class LogFormatTest extends \PHPUnit_Framework_TestCase
{
    protected $message;
    protected $context;
    protected $request;
    protected $response;
    protected $logFormat;

    public function setUp()
    {
        $this->message = $this->getMock('Websoftwares\AccessLog\Message\MessageInterface');
        $this->context = $this->getMock('Websoftwares\AccessLog\Context\ContextInterface');

        $this->request = $this->getMock('Psr\Http\Message\ServerRequestInterface');
        $this->response = $this->getMock('Psr\Http\Message\ResponseInterface');

        $this->logFormat = new LogFormat($this->message, $this->context);
    }

    public function testInstantiateAsObjectSucceeds()
    {
        $this->assertInstanceOf(
            'Websoftwares\AccessLog\LogFormat',
            $this->logFormat);
    }

    public function testGetContextSucceeds()
    {
        $exected = array('context');

        $this->context->expects($this->once())->method('getContext')
            ->with($this->equalTo($this->request), $this->equalTo($this->response))
            ->will($this->returnValue($exected));

        $actual = $this->logFormat->getContext($this->request, $this->response);

        $this->assertEquals($exected, $actual);
    }

    public function testGetMessageSucceeds()
    {
        $exected = '';

        $this->message->expects($this->once())->method('getMessage')
            ->with($this->equalTo(array('context')))
            ->will($this->returnValue($exected));

        $actual = $this->logFormat->getMessage(array('context'));

        $this->assertEquals($exected, $actual);
    }
}
