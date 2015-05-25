<?php

namespace Websoftwares\AccessLog;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * class Log.
 *
 * @author Boris <boris@websoftwar.es>
 */
class Log
{
    /**
     * $logger.
     *
     * @var Psr\Log\LoggerInterface
     */
    protected $logger;

    /**
     * $format.
     *
     * @var Websoftwares\AccessLog\LogFormat
     */
    protected $format;

    /**
     * __construct.
     *
     * @param LoggerInterface $logger
     * @param LogFormat       $format
     */
    public function __construct(
        LoggerInterface $logger,
        LogFormat $format
        ) {
        $this->logger = $logger;
        $this->format = $format;
    }

    /**
     * __invoke.
     *
     * @param ServerRequestInterface $request
     * @param ResponseInterface      $response
     */
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response
        ) {
        // Get context from request response
        $context = (array) $this->format->getContext($request, $response);

        // Get string formatted message from context
        $message = (string) $this->format->getMessage($context);

        try {
            $this->logger->info($message, $context);
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage(), $context);
        }
    }
}
