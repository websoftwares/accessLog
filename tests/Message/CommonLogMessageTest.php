<?php

namespace Websoftwares\Tests\AccessLog;

use Websoftwares\AccessLog\Message\CommonLogMessage;
use Websoftwares\AccessLog\Context\CommonLogContext;

/**
 * Class CommonLogMessageTest.
 */
class CommonLogMessageTest extends \PHPUnit_Framework_TestCase
{
    protected $context;
    protected $commonLogMessage;

    public function setUp()
    {
        $request = (new RequestResponseFactory())->newRequest();
        $response = (new RequestResponseFactory())->newResponse();

        $this->context = (new CommonLogContext())->getContext($request, $response);
        $this->commonLogMessage = new commonLogMessage();
    }

    public function testInstantiateAsObjectSucceeds()
    {
        $this->assertInstanceOf('Websoftwares\AccessLog\Message\CommonLogMessage', $this->commonLogMessage);
    }

    public function testGetContextSucceeds()
    {
        $actual = $this->commonLogMessage->getMessage($this->context);
        $this->assertInternalType('string', $actual);
    }
}
