<?php

namespace Websoftwares\AccessLog\Context;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * class CommonLogContext.
 *
 * @see  https://httpd.apache.org/docs/2.4/logs.html#common
 *
 * @author Boris <boris@websoftwar.es>
 */
class CommonLogContext extends AbstractContext
{
    /**
     * getCommongLogContext.
     *
     * @param ServerRequestInterface $request
     * @param ResponseInterface      $response
     *
     * @return array
     */
    protected function getCommonLogContext(ServerRequestInterface $request, ResponseInterface $response)
    {
        return array(
            'ip' => $this->getClientIpAddress($request),
            'user_identifier' => $this->getUserIdentifier(),
            'user' => $request->getUri()->getUserInfo(),
            'method' => $request->getMethod(),
            'uri' => array(
                'path' => $request->getUri()->getPath(),
                'scheme' => $request->getUri()->getScheme(),
                'protocol' => $request->getProtocolVersion(),
                ),
            'request_finished' => (strftime('%d/%b/%Y:%H:%M:%S %z')),
            'status_code' => $response->getStatusCode(),
            'response_size' => $response->getBody()->getSize(),
            );
    }

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
        return $this->getCommonLogContext($request, $response);
    }
}
