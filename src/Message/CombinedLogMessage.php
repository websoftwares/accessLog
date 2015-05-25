<?php

namespace Websoftwares\AccessLog\Message;

/**
 * class CombinedLogMessage.
 *
 * @see https://httpd.apache.org/docs/2.4/logs.html#combined
 *
 * @author Boris <boris@websoftwar.es>
 */
class CombinedLogMessage extends CommonLogMessage
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
        $format = '%s "%s" "%s"';

        return sprintf(
            $format,
            parent::getMessage($context),
            $context['http_referer'] ? $context['http_referer'] : '-',
            $context['http_user_agent'] ? $context['http_user_agent'] : '-'
        );
    }
}
