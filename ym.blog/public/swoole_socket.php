<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/17 0017
 * Time: 21:33
 */
$server = new \swoole_websocket_server('0.0.0.0', 8988);

$server->on('open', function ($server, $req) {
    echo "打开连接";
    var_dump($req->fd);
});

$server->on('message', function ($server, $frame) {
    echo "接收到信息：$frame->data";
    $server->push($frame->fd, 'welcome');
});

$server->on('close', function ($server, $req) {
    echo '链接关闭了';
});

$server->start();