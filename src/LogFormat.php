<?php

namespace Websoftwares\AccessLog;

use Websoftwares\AccessLog\Message\MessageInterface;
use Websoftwares\AccessLog\Context\ContextInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * class LogFormat.
 *
 * @author Boris <boris@websoftwar.es>
 */
class LogFormat
{
    /**
     * $message.
     *
     * @var object MessageInterface
     */
    public $message;

    /**
     * $context.
     *
     * @var object ContextInterface
     */
    public $context;

    /**
     * __construct.
     *
     * @param MessageInterface $message
     * @param ContextInterface $context
     */
    public function __construct(
        MessageInterface $message,
        ContextInterface $context
        ) {
        $this->message = $message;
        $this->context = $context;
    }

    /**
     * getContext.
     *
     * @param ServerRequestInterface $request
     * @param ResponseInterface      $response
     *
     * @return array
     */
    public function getContext(
        ServerRequestInterface $request,
        ResponseInterface $response
        ) {
        return $this->context->getContext($request, $response);
    }

    /**
     * getMessage.
     *
     * @param array $context
     *
     * @return string
     */
    public function getMessage(array $context)
    {
        return $this->message->getMessage($context);
    }
}
