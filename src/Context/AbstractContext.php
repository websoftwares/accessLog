<?php

namespace Websoftwares\AccessLog\Context;

use Psr\Http\Message\ServerRequestInterface;

/**
 * class AbstractContext.
 *
 * @author Boris <boris@websoftwar.es>
 */
abstract class AbstractContext implements ContextInterface
{
    /**
     * getUserIdentifier.
     *
     * @return string
     */
    protected function getUserIdentifier()
    {
        return '';
    }

    /**
     * getClientIpAddress Returns the IP address of the client (remote host) which made the request to the server.
     *
     * @todo needs better functionality for nginx, proxies, etc...
     *
     * @param ServerRequestInterface $request
     *
     * @return string
     */
    protected function getClientIpAddress(ServerRequestInterface $request)
    {
        return isset($request->getServerParams()['REMOTE_ADDR'])
            ? $request->getServerParams()['REMOTE_ADDR']
            : '';
    }

    /**
     * getHttpReferer Returns the address of the page (if any) which referred the user agent to the current page.
     *
     * @param ServerRequestInterface $request
     *
     * @return string
     */
    protected function getHttpReferer($request)
    {
        return isset($request->getServerParams()['HTTP_REFERER'])
            ? $request->getServerParams()['HTTP_REFERER']
            : '';
    }

    /**
     * getHttpReferer Returns identifying information that the client browser reports about itself.
     *
     * @param ServerRequestInterface $request
     *
     * @return string
     */
    protected function getHttpUserAgent($request)
    {
        return isset($request->getServerParams()['HTTP_USER_AGENT'])
            ? $request->getServerParams()['HTTP_USER_AGENT']
            : '';
    }
}
