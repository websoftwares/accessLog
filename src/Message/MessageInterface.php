<?php

namespace Websoftwares\AccessLog\Message;

/**
 * interface MessageInterface.
 *
 * @author Boris <boris@websoftwar.es>
 */
interface MessageInterface
{
    /**
     * getMessage.
     *
     * @param array $context
     *
     * @return string
     */
    public function getMessage(array $context);
}
