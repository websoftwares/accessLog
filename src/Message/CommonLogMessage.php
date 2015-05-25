<?php

namespace Websoftwares\AccessLog\Message;

/**
 * class CommonLogMessage.
 *
 * @see  https://httpd.apache.org/docs/2.4/logs.html#common
 *
 * @author Boris <boris@websoftwar.es>
 */
class CommonLogMessage extends AbstractMessage
{
    /**
     * getMessage.
     *
     * @param array $context
     *
     * @return string
     */
    public function getMessage(array $context)
    {
        $format = '%s %s %s [%s] "%s %s %s/%s" %d %d';

        return sprintf(
            $format,
            $context['ip'],
            $context['user_identifier'] ? $context['user_identifier'] : '-',
            $context['user'] ? $context['user'] : '-',
            $context['request_finished'],
            strtoupper($context['method']),
            $context['uri']['path'],
            strtoupper($context['uri']['scheme']),
            $context['uri']['protocol'],
            $context['status_code'],
            $context['response_size']
        );
    }
}
