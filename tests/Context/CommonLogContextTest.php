<?php

namespace Websoftwares\Tests\AccessLog;

use Websoftwares\AccessLog\Context\CommonLogContext;

/**
 * Class CommonLogContextTest.
 */
class CommonLogContextTest extends \PHPUnit_Framework_TestCase
{
    protected $request;
    protected $response;
    protected $commonLogContext;

    public function setUp()
    {
        $this->request = (new RequestResponseFactory())->newRequest();
        $this->response = (new RequestResponseFactory())->newResponse();

        $this->commonLogContext = new CommonLogContext();
    }

    public function testInstantiateAsObjectSucceeds()
    {
        $this->assertInstanceOf('Websoftwares\AccessLog\Context\CommonLogContext', $this->commonLogContext);
    }

    public function testGetContextSucceeds()
    {
        $actual = $this->commonLogContext->getContext($this->request, $this->response);
        $this->assertInternalType('array', $actual);
        $this->assertEquals('127.0.0.1', $actual['ip']);
        $this->assertEquals('', $actual['user_identifier']);
        $this->assertEquals('', $actual['user']);
        $this->assertEquals('GET', $actual['method']);
        $this->assertInternalType('array', $actual['uri']);
        $this->assertEquals('/blog/1', $actual['uri']['path']);
        $this->assertEquals('http', $actual['uri']['scheme']);
        $this->assertEquals('1.1', $actual['uri']['protocol']);
        $this->assertInternalType('string', $actual['request_finished']);
        $this->assertEquals(200, $actual['status_code']);
        $this->assertEquals(12, $actual['response_size']);
    }
}
