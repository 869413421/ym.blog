<?php

$server = new \swoole_http_server('0.0.0.0', 8988);
$server->on('request', function ($request, $respone) {
    $respone->header('Content-Type', "text/html;charset=utf-8");
    $respone->end('hello,word' . rand(1, 500));
});
$server->start();