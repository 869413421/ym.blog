<?php

$host = '0.0.0.0';
$port = 8988;

$server = new \swoole_server($host, $port, SWOOLE_PROCESS, SWOOLE_SOCK_UDP);

$server->on('packet', function ($server, $data, $fd) {
    var_dump($fd['address']);
    $server->sendto($fd['address'], $fd['port'], 'Server:' . $data);
});

$server->start();