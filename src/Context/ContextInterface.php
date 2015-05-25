<?php

namespace Websoftwares\AccessLog\Context;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * interface ContextInterface.
 *
 * @author Boris <boris@websoftwar.es>
 */
interface ContextInterface
{
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
        );
}
