<?php

$http = new Swoole\Http\Server('0.0.0.0', 9503);

$http->on('start', function ($server) {
    echo "Swoole http server is started at http://127.0.0.1:9503\n";
});

$http->on('request', function ($request, $response) {
    $response->header('Content-Type', 'text/plain');
    $response->end('Hello World');
});

$http->start();