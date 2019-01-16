<?php

$host = '0.0.0.0';
$port = '8988';

$server = new \swoole_server($host, $port, SWOOLE_PROCESS, SWOOLE_SOCK_UDP);

$server->on('packect', function ($server, $data, $fd) {
    $server->sendto($fd['address'], $fd['port'], 'Server:' . $data);
    var_dump($fd['address']);
});