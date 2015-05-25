<?php

namespace Websoftwares\AccessLog;

use Websoftwares\AccessLog\Message\CommonLogMessage;
use Websoftwares\AccessLog\Context\CommonLogContext;
use Websoftwares\AccessLog\Message\CombinedLogMessage;
use Websoftwares\AccessLog\Context\CombinedLogContext;

/**
 * class LogFormatFactory.
 *
 * @author Boris <boris@websoftwar.es>
 */
class LogFormatFactory
{
    /**
     * commonLog.
     *
     * @return LogFormat
     */
    public function commonLog()
    {
        return new LogFormat(new CommonLogMessage(), new CommonLogContext());
    }

    /**
     * combinedLog.
     *
     * @return LogFormat
     */
    public function combinedLog()
    {
        return new LogFormat(new CombinedLogMessage(), new CombinedLogContext());
    }
}
