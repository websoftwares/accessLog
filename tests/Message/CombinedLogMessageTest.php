<?php

namespace Websoftwares\Tests\AccessLog;

use Websoftwares\AccessLog\Message\CombinedLogMessage;
use Websoftwares\AccessLog\Context\CombinedLogContext;

/**
 * Class CombinedLogMessageTest.
 */
class CombinedLogMessageTest extends \PHPUnit_Framework_TestCase
{
    protected $context;
    protected $combinedLogMessage;

    public function setUp()
    {
        $request = (new RequestResponseFactory())->newRequest();
        $response = (new RequestResponseFactory())->newResponse();

        $this->context = (new CombinedLogContext())->getContext($request, $response);
        $this->combinedLogMessage = new CombinedLogMessage();
    }

    public function testInstantiateAsObjectSucceeds()
    {
        $this->assertInstanceOf('Websoftwares\AccessLog\Message\CombinedLogMessage', $this->combinedLogMessage);
    }

    public function testGetContextSucceeds()
    {
        $actual = $this->combinedLogMessage->getMessage($this->context);
        $this->assertInternalType('string', $actual);
    }
}
