<?php

namespace Websoftwares\Tests\AccessLog;

use Zend\Diactoros\ServerRequestFactory;
use Zend\Diactoros\Response;

class RequestResponseFactory
{
    public function newRequest()
    {
        $server['REQUEST_TIME_FLOAT'] = microtime(true);
        $server['SERVER_PROTOCOL'] = 'HTTP/1.1';
        $server['REMOTE_ADDR'] = '127.0.0.1';
        $server['REQUEST_URI'] = '/blog/1';
        $server['REQUEST_METHOD'] = 'GET';
        $server['HTTP_HOST'] = 'websoftwar.es';
        $server['QUERY_STRING'] = 'page=3';
        $server['HTTP_REFERER'] = 'http://websoftwar.es';
        $server['HTTP_USER_AGENT'] = 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/41.0.2272.76 Chrome/41.0.2272.76 Safari/537.36';

        $server = array_merge($_SERVER, $server);

        return ServerRequestFactory::fromGlobals($server);
    }

    public function newResponse()
    {
        $response = new Response();
        $response = $response->withStatus(200);
        $response->getBody()->write('Hello World!');

        return $response;
    }
}
