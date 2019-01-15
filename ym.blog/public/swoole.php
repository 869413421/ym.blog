<?php

$host = '0.0.0.0';
$port = 8988;
$server = new \swoole_server($host, $port, SWOOLE_PROCESS, SWOOLE_SOCK_TCP);

$server->on('connect', function ($server, $fd) {
    echo '連接成功';
});

$server->on('recevice', function ($server, $fd, $from_id, $data) {
    echo '接收到數據';
    var_dump($data);
});

$server->on('close', function ($server, $fd) {
    echo '關閉鏈接';
    var_dump($server, $fd);
});