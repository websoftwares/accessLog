<?php

namespace Websoftwares\AccessLog\Context;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * class CombinedLogContext.
 *
 * @see https://httpd.apache.org/docs/2.4/logs.html#combined
 *
 * @author Boris <boris@websoftwar.es>
 */
class CombinedLogContext extends CommonLogContext
{
    /**
     * getContext.
     *
     * @param ServerRequestInterface $request
     * @param ResponseInterface      $response
     *
     * @return array
     */
    public function getContext(ServerRequestInterface $request, ResponseInterface $response)
    {
        return $this->getCommonLogContext($request, $response) + array(
            'http_referer' => $this->getHttpReferer($request),
            'http_user_agent' => $this->getHttpUserAgent($request),
            );
    }
}
