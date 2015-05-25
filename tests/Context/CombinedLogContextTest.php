<?php

namespace Websoftwares\Tests\AccessLog;

use Websoftwares\AccessLog\Context\CombinedLogContext;

/**
 * Class CombinedLogContextTest.
 */
class CombinedLogContextTest extends \PHPUnit_Framework_TestCase
{
    protected $request;
    protected $response;
    protected $combinedLogContext;

    public function setUp()
    {
        $this->request = (new RequestResponseFactory())->newRequest();
        $this->response = (new RequestResponseFactory())->newResponse();

        $this->combinedLogContext = new CombinedLogContext();
    }

    public function testInstantiateAsObjectSucceeds()
    {
        $this->assertInstanceOf('Websoftwares\AccessLog\Context\CombinedLogContext', $this->combinedLogContext);
    }

    public function testGetContextSucceeds()
    {
        $actual = $this->combinedLogContext->getContext($this->request, $this->response);
        $this->assertInternalType('array', $actual);
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
        $this->assertEquals('http://websoftwar.es', $actual['http_referer']);
        $this->assertEquals('Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/41.0.2272.76 Chrome/41.0.2272.76 Safari/537.36', $actual['http_user_agent']);
    }
}
