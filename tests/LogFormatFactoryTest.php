<?php

namespace Websoftwares\Tests\AccessLog;

use Websoftwares\AccessLog\LogFormatFactory;

/**
 * Class LogFormatFactoryTest.
 */
class LogFormatFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->factory = new LogFormatFactory();
    }
    public function testInstantiateAsObjectSucceeds()
    {
        $actual = $this->factory->commonLog();
        $expected = 'Websoftwares\AccessLog\LogFormat';
        $this->assertInstanceOf($expected, $actual);

        $actual = $this->factory->combinedLog();
        $this->assertInstanceOf($expected, $actual);
    }
}
